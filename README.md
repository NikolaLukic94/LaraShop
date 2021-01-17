# Larashop

## Introduction

Shop App built with Laravel, VueJs and MySQL


## Technologies

- Laravel
- Vue/Vuex
- Vuetify
- MySQL


Setting up:


`php artisan db:seed`


Log in as admin@test.com or user@test.com (both passwords as 'password')

Normally you would have to verify email address - for testing purpose, this is already handled

Once logged in, head over to /dashboard to see Chart for sales breakdown per month, if logged in as Admin

Check out some books and they will appear in your 'recommended' section - you can thank Redis.

In order to test Stripe Payment integration, go ahead and include STRIPE_KEY and STRIPE_SECRET in `.env`

Test credit card:

```bash
Number : 4242424242424242
Brand : Visa
CVC : Any 3 digits
Date : Any future date
```
        

### Features

- Login with Github/Twitch/Facebook
- Vue chart feature
- Roles/permissions built with Spatie package
- Multiple formats report exports (csv, xls, pdf)
- Stripe Payment Integration
- Caching with Redis
- Nice autocomplete search
- Dynamic home page for (customer) users

More coming soon!
