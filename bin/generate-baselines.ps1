param()

Write-Host "Generating PHPStan baseline..."
vendor\bin\phpstan analyse --generate-baseline=phpstan-baseline.neon --memory-limit=1G -n || $true

Write-Host "Generating Psalm baseline..."
vendor\bin\psalm --set-baseline=psalm-baseline.xml -n || $true

Write-Host "Attempting automatic safe fixes with Psalm (--alter)..."
# Psalm can apply some safe fixes for certain issues
vendor\bin\psalm --alter --issues=UndefinedClass,UndefinedMethod,PossiblyUndefinedMethod -n || $true

Write-Host "Running PHP-CS-Fixer to fix style issues..."
vendor\bin\php-cs-fixer fix --allow-risky=yes -n || $true

Write-Host "Running Rector in dry-run (review changes before applying)..."
vendor\bin\rector process --dry-run || $true

Write-Host "Baselines generated (phpstan-baseline.neon, psalm-baseline.xml). Review Rector output before applying real refactors."