# Plan: Landing Page with Lesson Cards

## Overview

Build a landing page for the bridge lessons app that displays dynamically generated lessons as cards in a grid layout.

## Scope

- New landing page (`/`) replacing the default Laravel welcome page
- Display lessons as cards with titles and descriptions
- Grid layout matching the visual style in the provided screenshot
- No database - lessons are dynamically generated with no persistence

## Tech Stack

- Blade templates (Laravel's native templating)
- Vanilla JavaScript for interactivity
- CSS (Tailwind CSS v4)
- Laravel (PHP)

## Prerequisites

- This is a new feature for an existing Laravel app
- No authentication required
- No database needed

---

## Tasks

### Task 1: Save Spec Documentation

Create `agent-os/specs/2026-05-02-1153-landing-page-lesson-cards/` with:
- plan.md — This full plan
- shape.md — Shaping notes (scope, decisions, context)
- standards.md — (No specific standards needed)
- references.md — (Not applicable)
- visuals/lesson-cards-screenshot.png — Mockup from root folder

### Task 2: Create Lesson Data Structure

Define a PHP class or array structure that provides dynamic lesson data:
- Title
- Description
- Lesson type/info

Location: `app/Services/LessonData.php` or similar

### Task 3: Create Lesson Card Component

Create a reusable Blade component for lesson cards:
- Location: `resources/views/components/lesson-card.blade.php`
- Matches visual design in the screenshot

### Task 4: Build Landing Page

Modify or replace `resources/views/welcome.blade.php`:
- Display lesson cards in a grid layout
- Match the visual style in the provided screenshot
- Update the route if needed

---

## Visual Reference

See `visuals/lesson-cards-screenshot.png` for the target design.