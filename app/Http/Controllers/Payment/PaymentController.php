<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pay($id)
    {
        $organization = Organization::find($id);
        return view('payment.pay');
    }
    public function state()
    {
        $data = request()->query();

        $hmac = $data['hmac'];

        $amount_cents = $data['amount_cents'];
        $created_at = $data['created_at'];
        $currency = $data['currency'];
        $error_occured = $data['error_occured'];
        $has_parent_transaction = $data['has_parent_transaction'];
        $id = $data['id'];
        $integration_id = $data['integration_id'];
        $is_3d_secure = $data['is_3d_secure'];
        $is_auth = $data['is_auth'];
        $is_capture = $data['is_capture'];
        $is_refunded = $data['is_refunded'];
        $is_standalone_payment = $data['is_standalone_payment'];
        $is_voided = $data['is_voided'];
        $order_id = $data['order'];
        $owner = $data['owner'];
        $pending = $data['pending'];
        $source_data_pan = $data['source_data_pan'];
        $source_data_sub_type = $data['source_data_sub_type'];
        $source_data_type = $data['source_data_type'];
        $success = $data['success'];


        // $organization_name = $organization->name;
        $request_string = $amount_cents . $created_at . $currency . $error_occured . $has_parent_transaction . $id . $integration_id . $is_3d_secure . $is_auth . $is_capture . $is_refunded . $is_standalone_payment . $is_voided . $order_id . $owner . $pending . $source_data_pan . $source_data_sub_type . $source_data_type . $success;

        $hased = hash_hmac('SHA512', $request_string, '9E82E425C8FACDC093DEDF6D9E2EB7B4');

        return  $request_string . '<br>' . $hased . '<br>' . $hmac;

        // if($hmac == $hased){
        //     // new payment model in db
        // }

    }



    public function PostState(Request $request , Organization $organization)
    {
        $org = $organization->name;                            //database
        // return $org;
        $theRequest = $request;
        $json = json_decode($theRequest);

        $amount_cents = $json->obj->amount_cents;              //database
        $order_created_at = $json->obj->order->created_at;
        $currency = $json->obj->currency;
        $error_occured = $json->obj->error_occured;
        $has_parent_transaction = $json->obj->has_parent_transaction;
        $transaction_id = $json->obj->id;                       //database
        $integration_id = $json->obj->integration_id;           //database
        $is_3d_secure = $json->obj->is_3d_secure;
        $is_auth = $json->obj->is_auth;
        $is_capture = $json->obj->is_capture;
        $is_refunded = $json->obj->is_refunded;
        $is_standalone_payment = $json->obj->is_standalone_payment;
        $is_voided = $json->obj->is_voided;
        $order_id = $json->obj->order->id;                      //database
        $owner = $json->obj->owner;
        $pending = $json->obj->pending;
        $source_data_pan = $json->obj->source_data->pan;
        $source_data_type = $json->obj->source_data->type;
        $source_data_sub_type = $json->obj->source_data->sub_type;
        $success = $json->obj->success;                         //database

        $request_string = $amount_cents.$order_created_at.$currency.$error_occured.$has_parent_transaction.$transaction_id.$integration_id.$is_3d_secure.$is_auth.$is_capture.$is_refunded.$is_standalone_payment.$is_voided.$order_id.$owner.$pending.$source_data_pan.$source_data_type.$source_data_sub_type.$success;
        $hased_string = hash_hmac('SHA512', $request_string, '9E82E425C8FACDC093DEDF6D9E2EB7B4');

        $secure_hash = $json->obj->data->secure_hash;           //secure hash HMAC
        return $request_string . '<br>' . $hased_string . '<br>' . $secure_hash;





        // $order_merchant = $json->obj->order->merchant->id;
        // $order_items = $json->obj->order->items;


    }
}
