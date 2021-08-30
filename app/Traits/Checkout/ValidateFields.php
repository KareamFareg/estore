<?php

namespace App\Traits\Checkout;

trait ValidateFields{

    public function Validator($fields)
    {
        $this->validateOnly($fields,[
            'firstname' => 'required',
            'lastname'  => 'required',
            'email'     => 'required|email',
            'mobile'    => 'required|numeric',
            'line1'     => 'required',
            'province'  => 'required',
            'country'   => 'required',
            'city'      => 'required',
            'zipcode'   => 'required'
        ]);
        if ($this->ship_for_diff)
        {
            $this->validateOnly($fields,[
                's_firstname'  => 'required',
                's_lastname'   => 'required',
                's_email'      => 'required|email',
                's_mobile'     => 'required|numeric',
                's_line1'      => 'required',
                's_province'   => 'required',
                's_country'    => 'required',
                's_city'       => 'required',
                's_zipcode'    => 'required'
            ]);
        }
        if ($this->paymentmode == 'card')
        {
            $this->validateOnly($fields, [
                'card_no' => 'required|numeric',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
                'cvc' => 'required|numeric',
            ]);
        }
    }

}
