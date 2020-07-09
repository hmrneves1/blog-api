<?php

namespace App\Http\Controllers\Api\v1\Subscribers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Subscribers\NewSubscriber;
use App\Http\Requests\Api\v1\Subscribers\RequestUnsubscribeToken;
use App\Http\Requests\Api\v1\Subscribers\UnsubscribeByToken;
use App\Models\Api\v1\Subscribers\Subscribers;
use App\Traits\Api\v1\ApiResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * @group Subscribers
 */
class SubscribersController extends Controller
{
    /**
     * Import ApiResponse Trait
     */
    use ApiResponse;

    /**
     * Get All Subscribers
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        // Get all subscribers
        $subscribers = Subscribers::all();

        // Return data
        return $this->response(true, 200, config('http_responses.200'), $subscribers);
    }

    /**
     * Store
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function subscribe(NewSubscriber $request)
    {
        // Get the validated data from the request
        $validated_data = $request->validated();

        // Register the new subscriber
        $subscriber_stored = Subscribers::create($validated_data);

        // Validate if the subscriber was stored
        if ($subscriber_stored)
        {
            // return response
            return $this->response(true, 201, config('http_responses.201'), $validated_data);
        }

        // return default error response
        return $this->response(false, 500, config('http_responses.500'), []);
    }

    /**
     * GET Unsubscribe Token
     *
     * @param RequestUnsubscribeToken $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function request_unsuscribe_token(RequestUnsubscribeToken $request)
    {
        // Get the validated data from the request
        $validated_data = $request->validated();

        // Generate token
        $validated_data['token'] = uniqid(random_int(1, 999));

        // Set token expiration date
        $validated_data['token_expire_date'] = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Update subscriber record with new token
        $updated = Subscribers::where('email', '=', $validated_data['email'])->update($validated_data);

        // Validate if the subscriber data was updated
        if ($updated)
        {
            /**
             * @todo SEND EMAIL WITH LINK + TOKEN + EMAIL ADDRESS
             */
            /*if (!Mail::failures())
            {
                // return response
                return $this->response(true, 200, 'Please follow the instructions sended to your email.', []);
            }*/
            /**
             * TEMPORARY SOLUTION
             */
            return $this->response(true, 200, config('http_responses.200'), $validated_data);

            // return default error response
            return $this->response(false, 500, 'Error while sending the email with instructions. Try again later.', []);
        }

        // return default error response
        return $this->response(false, 500, config('http_responses.500'), []);
    }

    /**
     * Unsubscribe With Token
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function unsubscribeByToken(UnsubscribeByToken $request)
    {
        // Get the validated data from the request
        $validated_data = $request->validated();

        // Get subscriber by email + token
        $subscriber = Subscribers::where('email', '=', $validated_data['email'])->where('token', '=', $validated_data['token'])->first();

        // If we can't find the user by this email and token, return response
        if (!$subscriber)
        {
            // return not found response
            return $this->response(false, 404, config('http_responses.404'), []);
        }

        // Validate token age
        // if the token_expire_date is greater than now()
        if (date(now()) > $subscriber->token_expire_date)
        {
            // return not found response
            return $this->response(false, 410, 'The token has expired.', []);
        }

        // Delete subscription by default
        $deleted = $subscriber->delete();

        // Validate if the subscriber was deleted
        if ($deleted)
        {
            // return response
            return $this->response(true, 200, config('http_responses.200'), []);
        }

        // return default error message
        return $this->response(false, 500, config('http_responses.500'), []);
    }

}
