@component('mail::message')
# Introduction

we have recieved a request for reset password.

@component('mail::button', ['url' => url('http://rosheta.dev/dpassword/reset/'.$data['token'])])
Click to reset Now
@endcomponent

Thanks,<br>
Rosheta-online
@endcomponent