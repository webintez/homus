# Admin Frontend Quick Reference

## 🎨 Color Classes

### Primary Colors
```css
/* Indigo */
bg-indigo-50, text-indigo-600, border-indigo-300
bg-indigo-500, text-indigo-400, border-indigo-600

/* Purple */
bg-purple-50, text-purple-600, border-purple-300
bg-purple-500, text-purple-400, border-purple-600
```

### Status Colors
```css
/* Success */
bg-green-100, text-green-800, border-green-200
bg-green-500, text-green-400, border-green-600

/* Warning */
bg-orange-100, text-orange-800, border-orange-200
bg-orange-500, text-orange-400, border-orange-600

/* Error */
bg-red-100, text-red-800, border-red-200
bg-red-500, text-red-400, border-red-600

/* Info */
bg-blue-100, text-blue-800, border-blue-200
bg-blue-500, text-blue-400, border-blue-600
```

## 🧩 Component Templates

### Statistics Card
```html
<div class="bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-900/20 dark:to-cyan-900/20 p-6 rounded-2xl shadow-xl border border-blue-200 dark:border-blue-800">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-3xl font-bold text-blue-600 dark:text-blue-400">1,234</h3>
            <p class="text-blue-700 dark:text-blue-300 font-medium">Total Items</p>
        </div>
        <div class="h-12 w-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center shadow-lg">
            <svg class="h-6 w-6 text-white"><!-- Icon --></svg>
        </div>
    </div>
</div>
```

### Content Card
```html
<div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
    <div class="px-6 py-6 bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20 border-b border-indigo-200 dark:border-indigo-800">
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Card Title</h3>
        <p class="text-sm text-gray-600 dark:text-gray-400">Card description</p>
    </div>
    <div class="p-6">
        <!-- Card content -->
    </div>
</div>
```

### Primary Button
```html
<button class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
    <svg class="h-5 w-5 mr-2"><!-- Icon --></svg>
    Button Text
</button>
```

### Secondary Button
```html
<button class="inline-flex items-center px-4 py-2 text-sm font-semibold text-indigo-600 bg-indigo-50 hover:bg-indigo-100 dark:bg-indigo-900/20 dark:text-indigo-400 dark:hover:bg-indigo-900/30 rounded-lg transition-all duration-200">
    Button Text
</button>
```

### Form Input
```html
<div>
    <label for="field" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Field Label</label>
    <input type="text" id="field" name="field" 
           class="w-full px-4 py-3 border border-indigo-300 dark:border-indigo-600 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white transition-all duration-200">
</div>
```

### Status Badge
```html
<span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-300">
    Active
</span>
```

### Alert
```html
<div class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 border border-green-200 dark:border-green-800 rounded-2xl p-4 shadow-lg">
    <div class="flex items-center">
        <svg class="h-5 w-5 text-green-400 mr-3"><!-- Icon --></svg>
        <p class="text-sm font-medium text-green-800 dark:text-green-200">Success message</p>
    </div>
</div>
```

## 📱 Responsive Grids

### Basic Grid
```html
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    <!-- Grid items -->
</div>
```

### Statistics Grid
```html
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Statistics cards -->
</div>
```

### Form Grid
```html
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Form fields -->
</div>
```

## 🎯 Page Headers

### Standard Header
```html
<div class="mb-8">
    <h2 class="text-4xl font-bold bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">Page Title</h2>
    <p class="mt-3 text-lg text-gray-600 dark:text-gray-300">Page description</p>
</div>
```

### Section Header
```html
<div class="px-6 py-6 bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20 border-b border-indigo-200 dark:border-indigo-800">
    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Section Title</h3>
    <p class="text-sm text-gray-600 dark:text-gray-400">Section description</p>
</div>
```

## 🗂️ Navigation

### Sidebar Item
```html
<a href="#" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
    <svg class="h-5 w-5 mr-3"><!-- Icon --></svg>
    Navigation Item
</a>
```

### Tab Navigation
```html
<nav class="flex space-x-2">
    <button class="px-4 py-2 text-sm font-semibold text-white bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl shadow-lg">
        Active Tab
    </button>
    <button class="px-4 py-2 text-sm font-semibold text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300 rounded-xl transition-all duration-200">
        Inactive Tab
    </button>
</nav>
```

## 📊 Data Tables

### Table Structure
```html
<div class="overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-indigo-600 dark:text-indigo-400 uppercase tracking-wider">
                        Column Header
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                <tr class="hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 dark:hover:from-indigo-900/10 dark:hover:to-purple-900/10 transition-all duration-200">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                        Cell Content
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
```

## 📈 Charts

### Chart Container
```html
<div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
    <div class="px-6 py-6 bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20 border-b border-indigo-200 dark:border-indigo-800">
        <h5 class="text-xl font-bold text-gray-900 dark:text-white">Chart Title</h5>
        <p class="text-sm text-gray-600 dark:text-gray-400">Chart description</p>
    </div>
    <div class="p-6">
        <canvas id="chartId" height="200"></canvas>
    </div>
</div>
```

## 🎨 Gradients

### Background Gradients
```css
/* Card backgrounds */
bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900

/* Header backgrounds */
bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20

/* Statistics card backgrounds */
bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-900/20 dark:to-cyan-900/20
```

### Text Gradients
```css
/* Page titles */
bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent

/* Section titles */
bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent
```

## 🔧 Utility Classes

### Spacing
```css
/* Padding */
p-6, px-6, py-6, pt-6, pb-6, pl-6, pr-6

/* Margin */
mb-8, mt-6, mx-auto, my-4

/* Gap */
gap-6, gap-4, gap-2
```

### Shadows
```css
/* Card shadows */
shadow-lg, shadow-xl, shadow-2xl

/* Button shadows */
shadow-md, shadow-lg, hover:shadow-xl
```

### Borders
```css
/* Card borders */
border border-gray-200 dark:border-gray-700

/* Input borders */
border border-indigo-300 dark:border-indigo-600

/* Rounded corners */
rounded-lg, rounded-xl, rounded-2xl
```

### Transitions
```css
/* Button transitions */
transition-all duration-200

/* Hover effects */
hover:scale-105, hover:shadow-xl

/* Color transitions */
hover:bg-indigo-100, hover:text-indigo-700
```

## 🌙 Dark Mode

### Dark Mode Classes
```css
/* Backgrounds */
dark:bg-gray-800, dark:bg-gray-900

/* Text */
dark:text-white, dark:text-gray-300, dark:text-gray-400

/* Borders */
dark:border-gray-700, dark:border-indigo-600

/* Status colors */
dark:bg-green-900/20, dark:text-green-300
```

### Dark Mode Toggle
```javascript
function toggleDarkMode() {
    document.documentElement.classList.toggle('dark');
    localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
}
```

## 📱 Mobile Responsive

### Breakpoints
```css
/* Mobile first */
sm: 640px   /* Small devices */
md: 768px   /* Medium devices */
lg: 1024px  /* Large devices */
xl: 1280px  /* Extra large devices */
2xl: 1536px /* 2X large devices */
```

### Responsive Grids
```html
<!-- Responsive columns -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

<!-- Responsive flexbox -->
<div class="flex flex-col md:flex-row gap-4">

<!-- Responsive text -->
<h1 class="text-2xl md:text-3xl lg:text-4xl font-bold">
```

## 🎯 Common Patterns

### Empty State
```html
<div class="text-center py-16">
    <div class="mx-auto h-16 w-16 bg-gradient-to-r from-indigo-100 to-purple-100 dark:from-indigo-900/30 dark:to-purple-900/30 rounded-2xl flex items-center justify-center mb-4">
        <svg class="h-8 w-8 text-indigo-500"><!-- Icon --></svg>
    </div>
    <h3 class="mt-2 text-lg font-semibold text-gray-900 dark:text-white">No items found</h3>
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Start by creating your first item.</p>
</div>
```

### Loading State
```html
<div class="flex items-center justify-center py-8">
    <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-indigo-600"></div>
    <span class="ml-2 text-gray-600 dark:text-gray-400">Loading...</span>
</div>
```

### Pagination
```html
<div class="px-6 py-4 bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/10 dark:to-purple-900/10 border-t border-indigo-200 dark:border-indigo-800">
    <!-- Pagination content -->
</div>
```

## 🚀 Performance Tips

### CSS Optimization
- Use Tailwind's purge feature to remove unused CSS
- Minimize custom CSS in favor of utility classes
- Use CSS custom properties for theming

### JavaScript Optimization
- Use modern ES6+ syntax
- Implement proper error handling
- Use async/await for API calls
- Lazy load non-critical components

### Image Optimization
- Use WebP format with fallbacks
- Implement lazy loading
- Optimize image sizes for different breakpoints

---

## 📚 Resources

- **Tailwind CSS**: https://tailwindcss.com/docs
- **Heroicons**: https://heroicons.com/
- **Chart.js**: https://www.chartjs.org/docs/
- **Laravel Blade**: https://laravel.com/docs/blade
- **WCAG Guidelines**: https://www.w3.org/WAI/WCAG21/quickref/

---

*This quick reference guide provides the most commonly used classes and patterns for the admin frontend. For detailed documentation, see `ADMIN_FRONTEND_DOCUMENTATION.md`.*
