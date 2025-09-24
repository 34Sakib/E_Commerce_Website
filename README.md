# E-Commerce Website (Laravel)

Simple Laravel-based e-commerce demo. It provides:

- Admin product management (create, edit, delete)
- Frontend product listing and detail pages
- Shopping cart and basic checkout (orders)

This README shows how to set up the project locally (Windows PowerShell) and includes troubleshooting tips for the common runtime issues encountered in this repo.

---

## Requirements

- PHP 8.0+
- Composer
- SQLite or MySQL
- Node.js & npm (for frontend assets)

Tip: The project contains `database/database.sqlite` for quick local SQLite usage.

## Setup (development) — PowerShell

1. From project root (where `artisan` lives):

```powershell
composer install
cp .env.example .env ; php artisan key:generate
```

2. Configure DB in `.env`:

- For SQLite (quick): set `DB_CONNECTION=sqlite` and point `DB_DATABASE` to `database/database.sqlite`.
- For MySQL: set `DB_CONNECTION=mysql` and fill DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD.

3. Run migrations and seeders:

```powershell
php artisan migrate --seed
```

4. Frontend assets (optional during development):

```powershell
npm install
npm run dev
```

5. Serve the app:

```powershell
php artisan serve
```

Open http://127.0.0.1:8000

---

## Common tasks

- Run tests: `vendor/bin/pest` or `phpunit`
- Make migration: `php artisan make:migration create_x_table`
- Clear cache: `php artisan config:clear`

---

## Troubleshooting — common repo issues

- Undefined variable `$products` in a Blade view
	- Cause: the view was rendered without `$products` being passed by the controller.
	- Fixes:
		- Ensure the route or login redirect uses the controller method that returns the view with `$products` (e.g., `ProductController@frontend_index`).
		- Add a view composer in `app/Providers/AppServiceProvider.php` to share products with views:

```php
use Illuminate\Support\Facades\View;
use App\Models\Product;

public function boot()
{
		View::composer(['frontend.index','dashboard'], function ($view) {
				$view->with('products', Product::all());
		});
}
```

		- Defensive Blade change: `@foreach($products ?? [] as $product)`

- SQL error "Column 'Qty' cannot be null" when adding to cart
	- Cause: request didn't include the expected `Qty` field (case-sensitive name mismatch) or the controller didn't provide a fallback.
	- Fixes:
		- Ensure your add-to-cart form includes an input named `Qty` (or change the controller to accept `qty`).
		- Add a safe fallback in `ProductController::add_cart`:

```php
$request->validate(['Qty' => 'nullable|integer|min:1']);
$cart->Qty = (int) $request->input('Qty', $request->input('qty', 1));
```

---

## Project layout (high level)

- `app/Http/Controllers` — controllers (see `ProductController.php`)
- `resources/views/frontend` — frontend templates
- `resources/views/admin` — admin templates
- `database/migrations` — migrations

---

## Contributing

PRs and issues are welcome. For code changes:

1. Create a feature branch
2. Run tests and linters locally
3. Open a PR describing the change

---

## License

MIT
