# EvPay PHP SDK

Lightweight PHP SDK for integrating with the EvPay MNO Payment Gateway.
Supports payment requests, reconciliation, and callback handling.

---

## 🚀 Installation

Install via Composer:

```bash
composer require salymmbise/evpay
```

---

## ⚙️ Requirements

* PHP 8.1+
* Composer

---

## 📦 Basic Usage

### 1. Initialize Client

```php
require 'vendor/autoload.php';

use EvMak\Client;

$client = new Client(
    "https://your-evmak-api-url.com",
    "your-username"
);
```

---

### 2. Send Payment Request

```php
use EvMak\Payment;

$payment = new Payment($client);

$response = $payment->request([
    "api_source" => "WEBHOSTTZ",
    "api_to" => "TigoPesa", // Mpesa, AirtelMoney, HaloPesa
    "amount" => 1000,
    "product" => "TestPayment",
    "callback" => "https://yourdomain.com/callback",
    "mobileNo" => "255686668866",
    "reference" => uniqid("EVM")
]);

print_r($response);
```

---

### 3. Check Transaction (Reconciliation)

```php
use EvMak\Reconciliation;

$recon = new Reconciliation($client);

$status = $recon->check("EVM123456");

print_r($status);
```

---

## 🔐 Callback Handling

Your system must handle payment confirmation from EvMak.

### Example (Laravel)

```php
Route::post('/callback', function (\Illuminate\Http\Request $request) {

    $data = $request->all();

    // Validate and store transaction
    // Recommended: verify hash and reference

    return response()->json([
        "Status" => "Success"
    ]);
});
```

---

## 🔑 Hash Generation

The API uses MD5 hashing:

```php
md5(username . '|' . date('d-m-Y'));
```

This is handled automatically by the SDK.

---

## 📱 Supported Networks

* Mpesa
* TigoPesa
* AirtelMoney
* HaloPesa

---

## ⚠️ Best Practices

* Always store transactions before sending requests
* Use unique references (`uniqid()` or UUID)
* Secure your callback endpoint
* Log all API responses
* Implement retries for failed requests

---

## 🧪 Testing

Use sandbox/test endpoint provided by EvMak before going live.

---

## ❗ Error Handling

Typical response codes:

| Code | Meaning               |
| ---- | --------------------- |
| 200  | Success               |
| 403  | Authentication failed |
| 404  | Wrong destination     |
| 500  | Server error          |

---

## 🤝 Contributing

Pull requests are welcome. For major changes, open an issue first.

---

## 📄 License

MIT License
