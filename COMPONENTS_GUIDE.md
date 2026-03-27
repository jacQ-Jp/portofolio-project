# JEAUONIA - Visual Components Reference

## Color Scheme

### Primary Colors
```
Pink 400:        #f97316
Pink 300:        #fb923c
Orange 400:      #ea580c
Orange 300:      #fdba74

Gradient (Primary): from-pink-400 to-orange-400
Hover Gradient:     from-pink-500 to-orange-500
```

### Neutral Colors
```
Dark Gray:       #3a3a3a (text)
Medium Gray:     #666666
Light Gray:      #888888
Very Light Gray: #d0d0d0

Background:      #faf8f6 (off-white)
Surface:         #ffffff (white)
Border:          #e5e7eb (gray-200)
```

### Semantic Colors
```
Error:          #dc2626 (red-600)
Success:        #059669 (emerald-600)
Warning:        #d97706 (amber-600)
Info:           #3b82f6 (blue-500)
```

## Typography Hierarchy

### Page Title
```css
font-size:        2.25rem (48px) - 3.75rem (60px)
font-weight:      300 (light)
letter-spacing:   0.25em (4px)
color:            #3a3a3a
```

### Section Title
```css
font-size:        1.875rem (30px) - 2.25rem (36px)
font-weight:      300 (light)
letter-spacing:   0.15em (3px)
color:            #9ca3af (gray-400)
```

### Card Title
```css
font-size:        0.875rem (14px)
font-weight:      600 (semibold)
letter-spacing:   0.05em (1px)
text-transform:   uppercase
color:            #1f2937 (gray-800)
```

### Body Text
```css
font-size:        0.875rem (14px)
font-weight:      400 (regular)
letter-spacing:   0.02em (0.5px)
color:            #666666
```

### Small Text / Labels
```css
font-size:        0.75rem (12px)
font-weight:      600 (semibold)
letter-spacing:   0.1em (2px)
text-transform:   uppercase
color:            #4b5563
```

## Component Styles

### Buttons

#### Primary Button
```html
<button class="bg-gradient-to-r from-pink-400 to-orange-400 
                hover:from-pink-500 hover:to-orange-500
                text-white px-8 py-3 rounded-lg
                text-xs font-semibold tracking-widest
                transition shadow-lg hover:shadow-xl">
  PUBLISH DESIGN
</button>
```

#### Secondary Button
```html
<button class="border-2 border-gray-300
               text-gray-800 hover:bg-gray-100
               px-8 py-3 rounded-lg
               text-xs font-semibold tracking-widest
               transition uppercase">
  CANCEL
</button>
```

#### Icon Button (Links)
```html
<a class="w-8 h-8 flex items-center justify-center
        border border-gray-300 rounded
        hover:bg-gray-800 hover:text-white
        hover:border-gray-800 transition
        text-xs text-gray-600">
  <i class="fab fa-github"></i>
</a>
```

### Cards

#### Project Card
```html
<div class="bg-white rounded-lg border border-gray-100
           hover:shadow-xl transition
           hover:transform hover:translate-y-[-6px]">
  <img src="..." class="aspect-square object-cover
       group-hover:scale-110 transition duration-500"/>
  <div class="p-6 space-y-3">
    <!-- Content -->
  </div>
</div>
```

#### Info Box
```html
<div class="bg-gradient-to-r from-pink-100/50 to-orange-100/50
           rounded-xl p-12 border border-pink-200/50
           text-center">
  <!-- Content -->
</div>
```

### Form Elements

#### Input Text
```html
<input type="text" 
       class="w-full px-4 py-3 border border-gray-300 rounded-lg
              focus:outline-none focus:ring-2 focus:ring-pink-300
              font-light text-sm"/>
```

#### Textarea
```html
<textarea class="w-full px-4 py-3 border border-gray-300 rounded-lg
                focus:outline-none focus:ring-2 focus:ring-pink-300
                font-light text-sm"/>
```

#### Upload Zone
```html
<div class="border-2 border-dashed border-gray-300 rounded-lg
           p-12 text-center cursor-pointer
           hover:border-pink-400 hover:bg-pink-50
           transition duration-300">
  <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
  <!-- Content -->
</div>
```

### Tags

#### Tag Badge
```html
<span class="text-xs bg-gradient-to-r from-pink-100 to-orange-100
            text-gray-700 px-3 py-1 rounded-full font-light">
  UI Design
</span>
```

### Links Row
```html
<div class="flex gap-2 items-center pt-3 border-t border-gray-200">
  @if($project->figma_link)
    <a href="..." class="w-8 h-8 flex items-center justify-center
                        border border-gray-300 rounded
                        hover:bg-gray-800 hover:text-white
                        hover:border-gray-800 transition text-xs">
      <i class="fab fa-figma"></i>
    </a>
  @endif
  <!-- More links... -->
</div>
```

## Spacing System

```
xs:  4px   (0.25rem)
sm:  8px   (0.5rem)
md:  16px  (1rem)
lg:  24px  (1.5rem)
xl:  32px  (2rem)
2xl: 48px  (3rem)
3xl: 64px  (4rem)
```

### Common Spacing Classes
```
p-6    = padding: 1.5rem (24px)
px-8   = padding-left/right: 2rem (32px)
py-16  = padding-top/bottom: 4rem (64px)
gap-8  = gap: 2rem (32px)
mb-6   = margin-bottom: 1.5rem (24px)
```

## Animations

### Scale on Hover
```css
group-hover:scale-110    /* 1.1x larger */
transition duration-300
```

### Translate Up on Hover
```css
hover:transform hover:translate-y-[-6px]
transition duration-300
```

### Smooth Fade In
```css
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}
animation: fadeIn 0.3s ease-in;
```

### Gradient Overlay
```css
absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent
opacity-0 group-hover:opacity-30 transition duration-300
```

## Responsive Breakpoints

```
Mobile:    320px - 640px
Tablet:    641px - 1024px
Desktop:   1025px - 1280px
Ultra:     1280px+
```

### Responsive Classes Used
```
md:grid-cols-2   = 2 columns on tablet and up
lg:grid-cols-3   = 3 columns on desktop and up
hidden md:block  = Hidden on mobile, visible on tablet and up
```

## Border & Shadow

### Borders
```
border         = 1px solid #e5e7eb
border-2       = 2px solid
border-dashed  = dashed style
rounded-lg     = 8px border radius
rounded-xl     = 12px border radius
rounded-full   = 9999px (fully rounded)
```

### Shadows
```
shadow-md      = 0 4px 6px rgba(0, 0, 0, 0.1)
shadow-lg      = 0 10px 15px rgba(0, 0, 0, 0.1)
hover:shadow-xl = 0 20px 25px rgba(0, 0, 0, 0.15) on hover
```

## Usage Examples

### Creating a New Component
1. Follow the spacing system (multiples of 8px)
2. Use gradient for primary actions
3. Add hover effects with `transition duration-300`
4. Use semantic colors (red for danger, green for success)
5. Maintain 3px letter-spacing for uppercase text
6. Use font-light (300) for headers, regular (400) for body

### Color Swaps
To change the primary color scheme:
1. Find `from-pink-400 to-orange-400`
2. Replace with your colors: `from-blue-400 to-cyan-400`
3. Update hover: `from-blue-500 to-cyan-500`
4. Update light version: `from-blue-100 to-cyan-100`

### Text Hierarchy
```
Main Title:    text-6xl font-light tracking-widest
Section Title: text-4xl font-light tracking-widest
Card Title:    text-sm font-semibold tracking-widest uppercase
Body:          text-sm font-light
Small:         text-xs font-light
```

---

**Keep these patterns consistent across the entire application!**
