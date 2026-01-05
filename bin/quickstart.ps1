param(
    [switch]$Serve
)

if (-not (Test-Path -Path "composer.json")) {
    Write-Error "Run this script from project root"
    exit 1
}

composer install
Copy-Item -Path .env.example -Destination .env -Force
php artisan key:generate
php artisan migrate --seed

if ($Serve) {
    php artisan serve --host=0.0.0.0 --port=8000
} else {
    Write-Host "Demo setup complete. Run 'php artisan serve' or use 'make serve' to start the app."}
