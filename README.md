# Product Review REST API Endpoint

This is a basic REST API endpoint implemented in PHP to enable users to submit product reviews through POST requests containing JSON data. The API includes fundamental input validation, checking for non-empty fields and valid numerical IDs.

## Requirements

- PHP (version 7.0 or later)
- Web server (e.g., Apache, Nginx)

## Setup

1. Clone the repository to your local machine:

   ```bash
   git clone https://github.com/your-username/product-review-api.git
    ```
2. Configure your web server to point to the project directory.
3. Optionally, customize the database connection details in the code if you want to store reviews in a MySQL database.

## API Endpoint
```
Endpoint URL: /api.php
Method: POST
Request Format: JSON
```
## Request Example
```bash
{
  "product_id": 1,
  "user_id": 123,
  "review_text": "This is a great product!"
}
```

## Response Examples
### Success:
```bash
{
  "status": "success",
  "message": "Review submitted successfully"
}
```

### Invalid Input:
```bash
{
  "status": "error",
  "message": "Invalid input data"
}
```

### Invalid Request Method:
```bash
{
  "status": "error",
  "message": "Invalid request method"
}
```

## Optional Database Integration
Uncomment the database connection code in the API endpoint file (api.php) and customize it with your database details if you want to store reviews in a MySQL database.

```bash
// Uncomment and customize the following lines for database integration
// $db = new PDO('mysql:host=localhost;dbname=your_database', 'your_username', 'your_password');
// ... perform database operations ...
```









