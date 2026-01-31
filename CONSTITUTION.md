# دستور قالب Nasq (Nasq Themes Constitution)

## 📋 الغرض

هذا الدستور يحكم تطوير وصيانة قوالب WordPress الخاصة بشركة نسق (Nasq). يضمن اتساقية الجودة، الأمان، والتجربة المستخدم لجميع القوالب.

---

## 🎯 المبادئ الأساسية

### 1. الجودة أولاً (Quality First)
- كل كود يجب أن يكون خالٍا من الأخطاء
- جميع الميزات يجب أن تُختبر قبل الإطلاق
- لا تضح من الجودة للسرعة

### 2. RTL و العربية هي الأساس (RTL & Arabic First)
- دعم RTL هو جزء من التصميم الأساسي، ليس إضافة لاحقة
- جميع النصوص العربية يجب أن تكون مكتوبة بشكل صحيح
- الخطوط العربية (Tajawal, Cairo) مطلوبة

### 3. الأمان أولاً (Security First)
- التحقق من جميع المدخلات (sanitization)
- التحقق من جميع المخرجات (escaping)
- استخدام nonces لـ AJAX
- التحقق من الصلاحيات

### 4. الأداء أولاً (Performance First)
- سرعة تحميل الصفحة > 90 (PageSpeed)
- تحميل كسول للصور
- Minification لـ CSS و JavaScript
- Cache للاستفسارات المتكررة

### 5. إمكانية الوصول (Accessibility is Non-Negotiable)
- دعم لوحة المفاتيح
- تباين ألوان WCAG AA (4.5:1 للنصوص)
- ARIA labels للعناصر التفاعلية
- Skip links للتنقل

### 6. التوثيق (Documentation is Required)
- PHPDoc لجميع الدوال
- README شامل في كل قالب
- تعليقات في الكود للشرح
- أمثلة واضحة

### 7. التوافقية (Compatibility)
- WordPress 5.8+ مطلوب
- PHP 7.4+ مطلوب
- دعم WooCommerce اختياري لكن مفضّل
- دعم RTL مطلوب

---

## 🏗️ معايير الكود

### PHP
```php
/**
 * Function description
 *
 * @param string $param Description
 * @return string Return value
 */
function example_function($param) {
    // Always validate input
    $param = sanitize_text_field($param);
    
    // Always escape output
    return esc_html($param);
}
```

### CSS
```css
/* Use CSS variables */
:root {
  --primary-color: #1E7E34;
}

/* Use logical properties for RTL */
.element {
  margin-inline-start: 16px;  /* RTL: right, LTR: left */
}

/* Avoid !important unless necessary */
.button {
  background: var(--primary-color);
}
```

### JavaScript
```javascript
// Use modern JS
const init = () => {
  // Code here
};

document.addEventListener('DOMContentLoaded', init);

// Debounce resize events
let resizeTimer;
window.addEventListener('resize', () => {
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(handler, 250);
});
```

---

## 📝 قوالب الإدخال

### الملفات المطلوبة في كل قالب

```
theme-name/
├── style.css                 # Theme metadata
├── functions.php              # Main functionality
├── index.php                 # Fallback template
├── front-page.php           # Static front page
├── single.php               # Single post
├── page.php                 # Single page
├── 404.php                  # Not found page
├── header.php               # Site header
├── footer.php               # Site footer
├── inc/                     # Theme components
│   ├── setup.php            # Theme setup
│   ├── enqueue.php          # Scripts & styles
│   ├── hooks.php            # Hooks & filters
│   ├── customizer.php       # Customizer API
│   ├── template-tags.php    # Template functions
│   └── ajax.php            # AJAX handlers
├── template-parts/           # Reusable parts
│   ├── header.php
│   ├── footer.php
│   └── content.php
├── assets/
│   ├── css/
│   │   ├── style.css      # Main styles
│   │   └── rtl.css       # RTL styles
│   ├── js/
│   │   └── main.js       # Main JavaScript
│   └── fonts/            # Font files
└── languages/               # Translation files
    └── theme-name.pot    # Translation template
```

---

## 🔐 متطلبات الأمان

### يجب الالتزام بها:
1. **التحقق من ABSPATH** دائمًا:
```php
if (!defined('ABSPATH')) {
    exit;
}
```

2. **Sanitization للمدخلات**:
```php
$name = sanitize_text_field($_POST['name']);
$email = sanitize_email($_POST['email']);
$url = esc_url_raw($_POST['url']);
```

3. **Escaping للمخرجات**:
```php
echo esc_html($text);
echo esc_url($url);
echo esc_attr($attribute);
```

4. **Nonces لـ AJAX**:
```php
if (!wp_verify_nonce($_POST['nonce'], 'action_name')) {
    wp_die('Security check failed');
}
```

5. **التحقق من الصلاحيات**:
```php
if (!current_user_can('manage_options')) {
    wp_die('Unauthorized');
}
```

---

## 📊 قائمة التحقق قبل الإطلاق

قبل الإطلاق، تأكد من:

### الكود
- [ ] جميع الدوال لديها PHPDoc
- [ ] لا يوجد `!important` إلّا ضروري
- [ ] جميع المدخلات sanitized
- [ ] جميع المخرجات escaped
- [ ] لا يوجد كود مكرر
- [ ] الكود قيد 500 سطر للملف الواحد

### الأداء
- [ ] لا توجد JavaScript في الـ header
- [ ] الصور مضغوطة
- [ ] Lazy loading للصور
- [ ] Debatced resize events
- [ ] No inline styles في JavaScript

### إمكانية الوصول
- [ ] Skip links موجودة
- [ ] ARIA labels للعناصر التفاعلية
- [ ] تباين ألوان 4.5:1 على الأقل
- [ ] Keyboard navigation يعمل
- [ ] Focus states واضحة

### RTL/العربية
- [ ] RTL CSS منفصل
- [ ] الخطوط العربية محملة
- [ ] الاتجاه RTL صحيح
- [ ] النصوص العربية صحيحة

### الملفات
- [ ] جميع القوالب موجودة
- [ ] header.php و footer.php موجودان
- [ ] style.css مع metadata كامل
- [ ] README.md موجود

---

## 🧪 قوالب إضافية للقوالب المتخصصة

### للقوالب المتاجر (WooCommerce)
- صفحات المنتجات (product page, product loop)
- صفحة السلة (cart)
- صفحة الدفع (checkout)
- صفحة حسابي (my account)

### للقوالب المدونات
- Archive page مع grid
- Single post مع related posts
- Author page
- Categories page

### للقوالب التعليمية (LMS)
- Course grid
- Single course page
- Lessons list
- Progress tracking

### للقوالب الدينية
- أوقات الصلاة (prayer times)
- قراءة القرآن (Quran reader)
- التقاويم الهجرية
- اتجاه القبلة (Qibla)

---

## 📦 الإصدار والتوزيع

### رقم الإصدار
- يجب استخدام SemVer: `1.0.0`, `1.1.0`, `2.0.0`
- Minor updates: `1.0.1`
- Major updates: `2.0.0`

### التوزيع
- للقوالب المجانية: WordPress.org
- للقوالب الاحترافية: GitHub releases
- لجميع القوالب: GitHub tags

---

## 🚫 ما يجب تجنبه

### لا تستخدم:
- ❌ `eval()` أو `exec()` مع مدخلات من المستخدم
- ❌ استعلامات SQL مباشرة (استخدم `$wpdb->prepare()`)
- ❌ `$_GET` أو `$_POST` بدون sanitization
- ❌ `file_get_contents()` مع مدخلات من المستخدم
- ❌ كود مباشر في ملفات القالب (استخدم `inc/`)

### استخدم بدلاً من:
- ✅ الدوال WordPress المدمجة
- ✅ Hooks و filters
- ✅ Template tags
- ✅ Customizer API
- ✅ REST API عند الحاجة

---

## 🔄 الصيانة والتحديث

### عند التحديث:
1. لا تكسر التوافقية الخلفية
2. احتفظ بـ backward compatibility
3. أضف deprecation warnings للوظائف القديمة
4. حدّث التوثيق

### التوثيق في README.md:
- التثبيت
- الاستخدام
- التخصيص
- الترقية
- استكشاف الأخطاء

---

## 📧 معايير المراجعة

### عند مراجعة كود الآخرين:
1. تحقق من معايير هذا الدستور
2. ابحث عن نقاط تحسين محددة
3. اقترح تحسينات بناءً على المبادئ
4. كن بنّاء ومدني في النقد

### عند المراجعة:
- ابحث عن الأخطاء الأمنية أولاً
- ثم معايير الكود
- ثم الأداء
- ثم التوثيق

---

## 📞 الترخيص

جميع قوالب نسق مرخصة تحت:
- **GNU General Public License v2 أو أحدث**
- يجب ذكر ذلك في `style.css`

---

## 📞 الدعم

### للمطورين الآخرين:
- اقرأ هذا الدستور قبل المساهمة
- اتبع معايير الكود الموضوعة
- اختبر تغييراتك على جميع المتصفحات

### للمستخدمين:
- الإبلاغ عن الأخطاء على GitHub
- طلب الميزات عبر GitHub Issues
- استخدام الدعم الرسمي للأسئلة العامة

---

*آخر تحديث: 31 يناير 2026*
