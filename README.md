
# Payment Integration with Stripe Elements, Laravel, and Tailwind CSS

This boilerplate provides a streamlined solution for integrating Stripe payments into your Laravel application, styled with Tailwind CSS. It simplifies the process of setting up secure and responsive payment forms, making it easier for developers to implement and customize.

## Features
- **Stripe Elements**: Secure and customizable payment forms.
- **Laravel**: Robust backend framework for handling payment logic.
- **Tailwind CSS**: Utility-first CSS framework for quick and consistent styling.

## Installation

### Clone the Repository

```
git clone https://github.com/frahjokhio/laravel-stripe-payment-boilerplate.git
cd stripe-laravel-tailwind-boilerplate
```

### Install Dependencies

```
composer install
```

### Configure Environment Variables

Update your .env file with your Stripe API keys:

```
STRIPE_KEY=your_stripe_public_key
STRIPE_SECRET=your_stripe_secret_key
```

**Note**: you can find testing stripe keys in .env.example file

### Serve the Application

```
php artisan serve
```
### Access the Payment Page

Navigate to http://localhost:8000 to see the payment form in action.
