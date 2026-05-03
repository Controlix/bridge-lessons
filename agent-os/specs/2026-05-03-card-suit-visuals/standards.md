# Standards for Card and Suit Visuals

The following standards apply to this work.

---

## views/color-palette

Always use standard Tailwind CSS color utility classes instead of arbitrary hex codes.

```html
<!-- Good -->
<h1 class="text-gray-900 dark:text-gray-100">Title</h1>
<div class="bg-gray-50 border-gray-200">...</div>

<!-- Bad -->
<h1 class="text-[#1b1b18] dark:text-[#EDEDEC]">Title</h1>
<div class="bg-[#FDFDFC] border-[#e3e3e0]">...</div>
```

- Standard colors ensure consistency and make theming/dark mode easier to manage globally
- Reduces the size of the generated CSS since no arbitrary values are injected
