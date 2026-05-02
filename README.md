# Bridge Lessons

An interactive website for learning bridge, specifically teaching **Berry's Vijfkaart Hoog** (Berry's 5-card major), a popular Dutch bidding system by Berry Westra.

## About

This app provides structured lessons with interactive exercises to help complete beginners learn bridge from scratch. Each lesson covers a specific topic with clear explanations and hands-on practice.

## Tech Stack

- Laravel (PHP)
- Blade templates
- Vanilla JavaScript
- Pest for testing
- No database required

## Development

```bash
# Install dependencies
composer install
npm install

# Run dev server
npm run dev

# Run tests
php artisan test
```

## Project Structure

- `app/Http/Controllers/` — Lesson controllers
- `resources/views/` — Lesson pages and layouts
- `agent-os/reference/` — Bidding system reference (B5Cboek.pdf)
- `agent-os/product/` — Product planning docs
- `agent-os/standards/` — Code standards

## License

MIT