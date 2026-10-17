# Shoes API

**Course:** CIT3102  
**Project:** Build Your Own API  
**Resource:** Shoe  
**Partner 1:** Pasia, Del Ashley T.  
**Partner 2:** Keh, Astherton B.  
**Section:** IT3E

---

## 1. Project Description

The Shoes API is a RESTful API developed using Laravel for managing shoe inventory. It allows authenticated users to create, retrieve, update, and delete shoe records. It also supports filtering shoes by brand and color. User registration and login are implemented using Laravel Sanctum for API token authentication.

Each shoe record contains the following fields:

- `brand` — shoe brand
- `model` — shoe model
- `size` — shoe size
- `color` — shoe color
- `price` — shoe price
- `stock` — available quantity

## 2. Installation and Setup

### Requirements

- PHP
- Composer
- Git
- A database supported by the project configuration

### Installation Steps

**Step 1: Clone the repository**

Replace `YOUR-USERNAME` with the GitHub username that owns the repository.

```bash
git clone https://github.com/YOUR-USERNAME/cit3102-m5-shoe.git
cd cit3102-m5-shoe
```

**Step 2: Install dependencies**

```bash
composer install
```

**Step 3: Create the environment file**

On Windows PowerShell, run:

```powershell
Copy-Item .env.example .env
```

**Step 4: Generate the application key**

```bash
php artisan key:generate
```

**Step 5: Configure the database**

Configure the database settings in `.env` to match the project's database configuration. Create the database if required.

**Step 6: Run database migrations**

```bash
php artisan migrate
```

**Step 7: Start the Laravel server**

```bash
php artisan serve
```

The API base URL is:

`http://127.0.0.1:8000`

Use Bruno to send requests to the API endpoints.

## 3. API Routes

| Method | Endpoint | Description | Token Required |
|---|---|---|---|
| POST | `/api/register` | Register a new user | No |
| POST | `/api/login` | Authenticate a user and receive a token | No |
| POST | `/api/logout` | Log out and revoke the current token | Yes |
| GET | `/api/me` | Retrieve the authenticated user's information | Yes |
| GET | `/api/shoes` | Retrieve all shoes; supports filtering | Yes |
| POST | `/api/shoes` | Create a new shoe record | Yes |
| GET | `/api/shoes/{shoe}` | Retrieve a shoe by its ID | Yes |
| PUT | `/api/shoes/{shoe}` | Update an existing shoe record | Yes |
| DELETE | `/api/shoes/{shoe}` | Delete a shoe record | Yes |

### Filtering Examples

Retrieve all shoes:

`GET /api/shoes`

Filter by brand:

`GET /api/shoes?brand=Nike`

Filter by brand and color:

`GET /api/shoes?brand=Nike&color=Black`

All shoe endpoints require a valid Sanctum bearer token.

## 4. API Testing Screenshots

The following screenshots demonstrate the API requests and their HTTP response status codes. Each screenshot should show the request method, endpoint, response, and status code in Bruno.

### Screenshot 1: User Registration — 201 Created

![User Registration](screenshots/01-register.png)

### Screenshot 2: User Login — 200 OK

![User Login](screenshots/02-login.png)

### Screenshot 3: Get All Shoes Without a Token — 401 Unauthorized

![Unauthorized Request](screenshots/03-unauthorized.png)

### Screenshot 4: Get All Shoes With a Token — 200 OK

![Get All Shoes](screenshots/04-get-all-shoes.png)

### Screenshot 5: Create a Shoe — 201 Created

![Create Shoe](screenshots/05-create-shoe.png)

### Screenshot 6: Validation Error — 422 Unprocessable Entity

![Validation Error](screenshots/06-validation-error.png)

### Screenshot 7: Get Shoe by ID — 200 OK

![Get Shoe by ID](screenshots/07-get-shoe.png)

### Screenshot 8: Shoe Not Found — 404 Not Found

![Shoe Not Found](screenshots/08-not-found.png)

### Screenshot 9: Update Shoe — 200 OK

![Update Shoe](screenshots/09-update-shoe.png)

### Screenshot 10: Delete Shoe — 204 No Content

![Delete Shoe](screenshots/10-delete-shoe.png)

## 5. Why Does DELETE Return 204 Instead of 200?

HTTP status code 204 means that a request was successful and there is no response body to return. When a shoe is deleted, the server can confirm that the deletion was completed without sending the deleted shoe record back to the client. A 200 status code can also indicate success, but it is commonly used when the server returns a response body. Using 204 is appropriate when the client only needs confirmation that the shoe was deleted.