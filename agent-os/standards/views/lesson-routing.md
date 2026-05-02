# Lesson View Routing

Lessons are static views that map 1:1 with a URL slug to avoid database overhead.

```php
// app/Services/LessonService.php
// The canonical list of lessons is hardcoded here
return [
    [
        'title' => 'Opening bid on level 1',
        'slug' => 'opening-bid-level-1', // Matches the view filename
    ]
];
```

- **Views:** Each lesson must have a corresponding Blade view created at `resources/views/lessons/[slug].blade.php`
- **Routing:** Handled dynamically by `routes/web.php`, returning the view based on the slug or a 404 if the view file does not exist
- **Data Source:** Do not use a database for lesson content; rely on static Blade files to keep overhead low
