<h1 align="center"><b>Larashop</b></h1>

<b>Technologies used:</b>

- Laravel (mostly as an API)
- Vue
- Vuetify

<p align="center"><b>Setting up Larashop App:</b></p>

<ul>
    <li>php artisan db:seed</li>
    <li>log in as admin@test.com or user@test.com (both passwords as 'password')</li>
    <li>Normally you would have to verify email address - for testing purpose, this is already handled</li>
    <li>Once logged in, head over to /dashboard to see <b>Chart</b> for sales breakdown per month, if logged in as Admin</li>
    <li>In order to test Stripe Payment integration, go ahead and include STRIPE_KEY and STRIPE_SECRET in .env. The following are credit card test params:</li>
        <ul>
            <li>Number : 4242424242424242</li>
            <li>Brand : Visa</li>
            <li>CVC : Any 3 digits</li>
            <li>Date : Any future date</li>
        </ul>
    
</ul>

<p>This project includes:</p>
<ul>
    <li>Login with Github/Twitch</li>
    <li>Vue chart feature</li>
    <li>Roles/permissions built with Spatie package</li>
    <li>Multiple formats report exports (csv, xls, pdf)</li>
    <li>Stripe Payment Integration</li>
</ul>

<p>...more coming soon!</p>