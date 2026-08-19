<?php
/**
 * Template Name: Return Policy
 * Theme: Ana9a
 */
get_header(); ?>

<main class="max-w-[900px] mx-auto px-6 py-16 md:py-24" dir="rtl">

    <header class="text-center mb-16 animate-reveal">
        <span class="text-[11px] font-black tracking-widest uppercase bg-brand-black text-brand-white px-3 py-1 rounded-full animate-reveal">
            <?php _e('سياساتنا', 'ana9a'); ?>
        </span>
        <h1 class="text-3xl md:text-5xl font-black uppercase tracking-tighter text-brand-black mt-4 mb-3 animate-reveal">
            <?php _e('سياسة الاستبدال والإرجاع', 'ana9a'); ?>
        </h1>
        <p class="text-sm text-brand-gray-500 animate-reveal">
            <?php _e('حقك محفوظ — اقرأ شروطنا بكل وضوح', 'ana9a'); ?>
        </p>
    </header>

    <div class="space-y-6">

        <?php
        $sections = [
            [
                'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                'title' => __('متى تقدر تستبدل؟', 'ana9a'),
                'content' => __('تقدر تطلب الاستبدال في ظرف 48 ساعة من استلام طلبيتك — بشرط أن المنتج ما استعملتوش وراه في حالته الأصلية مع كل ملحقاته.', 'ana9a'),
                'type' => 'success',
            ],
            [
                'icon' => 'M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4',
                'title' => __('كيفاش تطلب الاستبدال؟', 'ana9a'),
                'content' => __('راسلنا على الواتساب أو اتصل بينا مباشرة خلال 48 ساعة من الاستلام. أخبرنا بسبب الاستبدال ورقم طلبيتك، وراه فريقنا يرتب معك كل شي.', 'ana9a'),
                'type' => 'info',
            ],
            [
                'icon' => 'M5 13l4 4L19 7',
                'title' => __('حالات نقبل فيها الاستبدال', 'ana9a'),
                'items' => [
                    __('المقاس مش مناسب', 'ana9a'),
                    __('المنتج وصل معيب أو تالف', 'ana9a'),
                    __('المنتج مختلف على اللي طلبته', 'ana9a'),
                ],
                'type' => 'list-success',
            ],
            [
                'icon' => 'M6 18L18 6M6 6l12 12',
                'title' => __('حالات ما نقبلوش فيها الاستبدال', 'ana9a'),
                'items' => [
                    __('المنتج استعمل أو اتوسخ', 'ana9a'),
                    __('فات على الاستلام أكثر من 48 ساعة', 'ana9a'),
                    __('ما عندوش الكرتون أو الملحقات الأصلية', 'ana9a'),
                ],
                'type' => 'list-danger',
            ],
            [
                'icon' => 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z',
                'title' => __('الاسترجاع (الدراهم)', 'ana9a'),
                'content' => __('ما نرجعوش الأموال نقداً. الاستبدال يكون بمنتج آخر بنفس القيمة أو أعلى مع تسوية الفرق. في حالات استثنائية، نحكيو مع بعض على حل مناسب.', 'ana9a'),
                'type' => 'warning',
            ],
        ];
        ?>

        <?php foreach ($sections as $s) : ?>
            <?php
            $colors = [
                'success' => 'border-green-200 bg-green-50',
                'info'    => 'border-blue-200 bg-blue-50',
                'warning' => 'border-yellow-200 bg-yellow-50',
                'list-success' => 'border-green-200 bg-green-50',
                'list-danger'  => 'border-red-200 bg-red-50',
            ];
            $icon_colors = [
                'success' => 'text-green-600',
                'info'    => 'text-blue-600',
                'warning' => 'text-yellow-600',
                'list-success' => 'text-green-600',
                'list-danger'  => 'text-red-500',
            ];
            ?>
            <div class="p-6 border rounded-2xl reveal-on-scroll <?php echo $colors[$s['type']]; ?>">
                <div class="flex items-start gap-4 reveal-on-scroll">
                    <div class="shrink-0 mt-0.5">
                        <svg class="w-5 h-5 <?php echo $icon_colors[$s['type']]; ?>" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="<?php echo $s['icon']; ?>"/>
                        </svg>
                    </div>
                    <div class="space-y-2 flex-1 reveal-on-scroll">
                        <h3 class="font-black text-brand-black text-base uppercase tracking-tight">
                            <?php echo $s['title']; ?>
                        </h3>
                        <?php if (isset($s['content'])) : ?>
                            <p class="text-sm text-brand-gray-600 leading-relaxed">
                                <?php echo $s['content']; ?>
                            </p>
                        <?php endif; ?>
                        <?php if (isset($s['items'])) : ?>
                            <ul class="space-y-1.5 mt-2">
                                <?php foreach ($s['items'] as $item) : ?>
                                    <li class="text-sm text-brand-gray-600 flex items-center gap-2 ">
                                        <span class="w-1.5 h-1.5 rounded-full <?php echo str_contains($s['type'], 'danger') ? 'bg-red-400' : 'bg-green-400'; ?> shrink-0"></span>
                                        <?php echo $item; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

    <div class="mt-4 md:mt-12 p-8 bg-brand-black rounded-3xl text-center text-white space-y-4 animate-reveal">
        <h2 class="text-xl font-black uppercase"><?php _e('عندك سؤال؟', 'ana9a'); ?></h2>
        <p class="text-sm text-brand-gray-300">
            <?php _e('تواصل معنا مباشرة وراه نحلو معك في أقرب وقت.', 'ana9a'); ?>
        </p>
        <a href="<?php echo esc_url( home_url('/contact-us/') ); ?>"
           class="inline-flex items-center gap-2 bg-white text-brand-black px-6 py-3 rounded-xl text-sm font-black uppercase tracking-wider hover:bg-brand-gray-100 transition-colors">
            <?php _e('اتصل بينا', 'ana9a'); ?>
        </a>
    </div>

</main>

<?php get_footer(); ?>