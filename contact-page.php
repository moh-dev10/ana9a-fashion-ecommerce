<?php
/**
 * Template Name: Contact Us Template
 * Theme: Ana9a - French Fashion Blueprint
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); ?>

<main
    class="max-w-[1200px] mx-auto px-4 sm:px-6 py-12 md:py-16 lg:py-20 animate-fade-in"
    dir="ltr"
>

    <!-- =========================
         Page Header
    ========================== -->
    <header class="text-center max-w-2xl mx-auto mb-12 md:mb-16 animate-reveal">

        <span class="inline-flex items-center text-[10px] sm:text-[11px] font-black tracking-widest uppercase bg-brand-black text-brand-white px-3 py-1.5 rounded-full">
            <?php _e( 'CONTACTEZ-NOUS', 'ana9a' ); ?>
        </span>

        <h1 class="text-3xl sm:text-4xl md:text-5xl font-black uppercase tracking-tighter text-brand-black mt-4 mb-4 leading-[1.05]">
            <?php _e( 'Une question ? Nous sommes là.', 'ana9a' ); ?>
        </h1>

        <p class="text-sm md:text-[15px] text-brand-gray-500 leading-7 max-w-xl mx-auto">
            <?php _e(
                'Une question sur un article, une taille, une commande ou une livraison ? Notre équipe est là pour vous répondre.',
                'ana9a'
            ); ?>
        </p>

    </header>


    <!-- =========================
         Contact Content
    ========================== -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-14 items-start">


        <!-- =========================
             Contact Information
        ========================== -->
        <div class="lg:col-span-5">

            <div class="space-y-4">


                <!-- Phone -->
                <?php
get_template_part(
    'template-parts/contact/contact-method',
    null,
    [
        'icon'        => 'phone',
        'title'       => __( 'Appelez-nous', 'ana9a' ),
        'description' => __( 'Pour toute question ou commande', 'ana9a' ),
        'value'       => '+213 555 55 55 55',
        'url'         => 'tel:+213555555555',
    ]
);
?>


<?php
get_template_part(
    'template-parts/contact/contact-method',
    null,
    [
        'icon'        => 'email',
        'title'       => __( 'Écrivez-nous', 'ana9a' ),
        'description' => __( 'Pour toute demande ou collaboration', 'ana9a' ),
        'value'       => 'contact@example.com',
        'url'         => 'mailto:contact@example.com',
    ]
);
?>


<?php
get_template_part(
    'template-parts/contact/contact-method',
    null,
    [
        'icon'        => 'whatsapp',
        'title'       => __( 'WhatsApp', 'ana9a' ),
        'description' => __( 'Une réponse rapide', 'ana9a' ),
        'value'       => __( 'Nous contacter', 'ana9a' ),
        'url'         => 'https://wa.me/213555555555',
    ]
);
?>


                <!-- Opening Hours -->
                <div class="p-5 sm:p-6 bg-brand-white-soft border border-brand-gray-100 rounded-brand flex items-start gap-4">

                    <div class="shrink-0 p-3 bg-brand-white rounded-brand shadow-2xs text-brand-black">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-5 h-5"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                            />
                        </svg>

                    </div>

                    <div>

                        <h2 class="text-sm font-bold text-brand-black uppercase tracking-tight">
                            <?php _e( 'Horaires', 'ana9a' ); ?>
                        </h2>

                        <p class="text-xs text-brand-gray-500 mt-2 leading-6">
                            <?php _e( 'Samedi → Jeudi : 09h00 – 21h00', 'ana9a' ); ?><br>
                            <?php _e( 'Vendredi : Fermé', 'ana9a' ); ?>
                        </p>

                    </div>

                </div>

            <?php
             get_template_part( 'template-parts/contact/social-links' );
             ?>

            </div>


            <!-- Quick Response Note -->
            <div class="mt-5 px-1">

                <p class="text-[11px] text-brand-gray-400 leading-5">
                    <?php _e(
                        'Nous faisons notre possible pour répondre à toutes les demandes dans les meilleurs délais.',
                        'ana9a'
                    ); ?>
                </p>

            </div>

        </div>


        <!-- =========================
             Contact Form
        ========================== -->
        <div class="lg:col-span-7 bg-brand-white border border-brand-gray-100 rounded-brand md:rounded-brand p-5 sm:p-7 md:p-10 shadow-2xs">

            <div class="mb-7">

                <h2 class="text-xl md:text-2xl font-black text-brand-black tracking-tight">
                    <?php _e( 'Envoyez-nous un message', 'ana9a' ); ?>
                </h2>

                <p class="text-xs text-brand-gray-400 mt-2 leading-relaxed">
                    <?php _e(
                        'Remplissez le formulaire ci-dessous et nous vous répondrons dès que possible.',
                        'ana9a'
                    ); ?>
                </p>

            </div>


            <form
                action="#"
                method="POST"
                class="space-y-5"
                novalidate
            >

                <!-- Name + Phone -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <!-- Name -->
                    <div class="flex flex-col gap-1.5">

                        <label
                            for="contact_name"
                            class="text-[11px] font-bold text-brand-gray-700 uppercase tracking-wide"
                        >
                            <?php _e( 'Nom complet', 'ana9a' ); ?>
                        </label>

                        <input
                            type="text"
                            id="contact_name"
                            name="name"
                            required
                            autocomplete="name"
                            placeholder="<?php esc_attr_e( 'Votre nom', 'ana9a' ); ?>"
                            class="w-full bg-brand-white-soft border border-brand-gray-200 rounded-brand px-4 py-3.5 text-sm text-brand-black placeholder:text-brand-gray-400 outline-none transition-all duration-200 focus:border-brand-black focus:bg-brand-white focus:ring-2 focus:ring-brand-black/10"
                        >

                    </div>


                    <!-- Phone -->
                    <div class="flex flex-col gap-1.5">

                        <label
                            for="contact_phone"
                            class="text-[11px] font-bold text-brand-gray-700 uppercase tracking-wide"
                        >
                            <?php _e( 'Téléphone', 'ana9a' ); ?>
                        </label>

                        <input
                            type="tel"
                            id="contact_phone"
                            name="phone"
                            required
                            autocomplete="tel"
                            inputmode="tel"
                            placeholder="0555 55 55 55"
                            class="w-full bg-brand-white-soft border border-brand-gray-200 rounded-brand px-4 py-3.5 text-sm text-brand-black placeholder:text-brand-gray-400 outline-none transition-all duration-200 focus:border-brand-black focus:bg-brand-white focus:ring-2 focus:ring-brand-black/10"
                            dir="ltr"
                        >

                    </div>

                </div>


                <!-- Subject -->
                <div class="flex flex-col gap-1.5">

                    <label
                        for="contact_subject"
                        class="text-[11px] font-bold text-brand-gray-700 uppercase tracking-wide"
                    >
                        <?php _e( 'Sujet', 'ana9a' ); ?>
                    </label>

                    <select
                        id="contact_subject"
                        name="subject"
                        class="w-full bg-brand-white-soft border border-brand-gray-200 rounded-brand px-4 py-3.5 text-sm text-brand-black outline-none transition-all duration-200 focus:border-brand-black focus:bg-brand-white focus:ring-2 focus:ring-brand-black/10"
                    >

                        <option value="">
                            <?php _e( 'Sélectionnez un sujet', 'ana9a' ); ?>
                        </option>

                        <option value="order">
                            <?php _e( 'Question concernant ma commande', 'ana9a' ); ?>
                        </option>

                        <option value="size">
                            <?php _e( 'Question sur les tailles', 'ana9a' ); ?>
                        </option>

                        <option value="delivery">
                            <?php _e( 'Question sur la livraison', 'ana9a' ); ?>
                        </option>

                        <option value="exchange">
                            <?php _e( 'Échange ou retour', 'ana9a' ); ?>
                        </option>

                        <option value="other">
                            <?php _e( 'Autre demande', 'ana9a' ); ?>
                        </option>

                    </select>

                </div>


                <!-- Message -->
                <div class="flex flex-col gap-1.5">

                    <label
                        for="contact_message"
                        class="text-[11px] font-bold text-brand-gray-700 uppercase tracking-wide"
                    >
                        <?php _e( 'Votre message', 'ana9a' ); ?>
                    </label>

                    <textarea
                        id="contact_message"
                        name="message"
                        rows="5"
                        required
                        autocomplete="off"
                        placeholder="<?php esc_attr_e( 'Écrivez votre message ici...', 'ana9a' ); ?>"
                        class="w-full bg-brand-white-soft border border-brand-gray-200 rounded-brand px-4 py-3.5 text-sm text-brand-black placeholder:text-brand-gray-400 outline-none transition-all duration-200 focus:border-brand-black focus:bg-brand-white focus:ring-2 focus:ring-brand-black/10 resize-none"
                    ></textarea>

                </div>


                <!-- Submit -->
                <button
                    type="submit"
                    class="w-full bg-brand-black text-brand-white py-4 rounded-brand text-[11px] font-black tracking-widest uppercase hover:bg-brand-black-dark active:scale-[0.99] transition-all duration-200 cursor-pointer shadow-sm focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-black focus-visible:ring-offset-2"
                >
                    <?php _e( 'ENVOYER LE MESSAGE', 'ana9a' ); ?>
                </button>

            </form>

        </div>

    </div>

    <?php
    get_template_part( 'template-parts/contact/google-map' );
    ?>

</main>



<?php get_footer(); ?>