<!DOCTYPE html>
<html lang="en-US" class>

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Arnaldo Tomo - Engenheiro de Software especializado em Laravel e React Native. Desenvolvendo soluções tecnológicas inovadoras em Moçambique.">
    <meta name="keywords"
        content="Arnaldo Tomo, Engenheiro de Software, Laravel, React Native, Desenvolvimento Web, Desenvolvimento Mobile, Moçambique, Programação, Full Stack Developer">
    <meta name="author" content="Arnaldo Tomo">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <meta name="theme-color" content="#36dbea">
    <title>Arnaldo Tomo - Desenvolvedor Full Stack</title>
    <!-- Metadados básicos -->
    <meta name="google-site-verification" content="Gm_zV_n5JJAnYKHcwVWedaXWQeZ9kODeNp4sXe3ku-A" />
    {{-- og --}}
    <meta property="og:locale" content="pt_PT" />
    <meta property="og:locale:alternate" content="en_EN" />
    <meta property="og:locale:alternate" content="fr_FR" />
    <meta property="og:locale:alternate" content="es_ES" />
    {{-- og --}}

<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://arnaldotomo.dev/">
    <meta property="og:title" content="Arnaldo Tomo | Engenheiro de Software">
    <meta property="og:description"
        content="Desenvolvedor Full Stack especializado em Laravel e React Native, criando soluções tecnológicas inovadoras em Moçambique.">
    <meta property="og:image" content="https://arnaldotomo.dev/images/profile-preview.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:type" content="image/jpeg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://arnaldotomo.dev/">
    <meta property="twitter:title" content="Arnaldo Tomo | Engenheiro de Software">
    <meta property="twitter:description"
        content="Desenvolvedor Full Stack especializado em Laravel e React Native, criando soluções tecnológicas inovadoras em Moçambique.">
    <meta property="twitter:image" content="https://arnaldotomo.dev/images/profile-preview.jpg">

    <!-- Favicon -->
    <link rel="icon" href="images/favicon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link rel="manifest" href="site.webmanifest">

    <!-- Canonical URL -->
    <link rel="canonical" href="https://arnaldotomo.dev/">
    <link rel="sitemap" type="application/xml" href="https://arnaldotomo.dev/sitemap.xml">

    <!-- Preconnect to resources -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Cores tecnológicas (dados estruturados para SEO) -->
    <!-- Schema: WebSite (activa Sitelinks no Google) -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "Arnaldo Tomo",
        "alternateName": "Arnaldo Tomo - Software Engineer",
        "url": "https://arnaldotomo.dev",
        "description": "Portfólio de Arnaldo Tomo — Software Engineer especializado em Laravel e React Native, Moçambique.",
        "inLanguage": ["pt", "en"],
        "potentialAction": {
            "@type": "SearchAction",
            "target": "https://arnaldotomo.dev/en#{search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
    </script>

    <!-- Schema: Person -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Arnaldo Tomo",
        "givenName": "Arnaldo",
        "familyName": "Tomo",
        "jobTitle": "Software Engineer",
        "description": "Software Engineer especializado em Laravel, React Native e desenvolvimento Full Stack. Baseado em Maputo, Moçambique.",
        "url": "https://arnaldotomo.dev",
        "image": "https://arnaldotomo.dev/images/profile-preview.jpg",
        "email": "contacto@arnaldotomo.dev",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Maputo",
            "addressCountry": "MZ"
        },
        "sameAs": [
            "https://www.linkedin.com/in/arnaldo-tomo",
            "https://github.com/arnaldo-tomo",
            "https://twitter.com/arnaldotomo",
            "https://medium.com/@arnaldotomo",
            "https://packagist.org/users/arnaldo-tomo"
        ],
        "knowsAbout": ["Laravel", "React Native", "JavaScript", "PHP", "Python", "Full Stack Development", "Mobile Development"],
        "hasOccupation": {
            "@type": "Occupation",
            "name": "Software Engineer",
            "occupationLocation": { "@type": "Country", "name": "Mozambique" },
            "skills": "Laravel, React Native, PHP, JavaScript, Python"
        }
    }
    </script>

    <!-- Schema: SiteNavigationElement (gera Sitelinks) -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ItemList",
        "name": "Navegação do Portfólio",
        "itemListElement": [
            { "@type": "SiteLinksSearchBox", "url": "https://arnaldotomo.dev/en" },
            { "@type": "ListItem", "position": 1, "name": "Sobre Mim",   "url": "https://arnaldotomo.dev/en#About"     },
            { "@type": "ListItem", "position": 2, "name": "Projectos",   "url": "https://arnaldotomo.dev/en#Projects"  },
            { "@type": "ListItem", "position": 3, "name": "Formação",    "url": "https://arnaldotomo.dev/en#Education" },
            { "@type": "ListItem", "position": 4, "name": "Blog",        "url": "https://arnaldotomo.dev/en#Blog"      },
            { "@type": "ListItem", "position": 5, "name": "Pacotes",     "url": "https://arnaldotomo.dev/en#Packages"  },
            { "@type": "ListItem", "position": 6, "name": "Contacto",    "url": "https://arnaldotomo.dev/en#Contact"   }
        ]
    }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


    <link rel="stylesheet" id="contact-form-7-css" href="css/styles.css?v=1.1" type="text/css" media="all">
    <link rel="stylesheet" id="vlt-theme-style-css" href="css/style_1.css?v=1.1" type="text/css" media="all">
    <link rel="stylesheet" id="vlt-gilroy-font-css" href="css/style.css?v=1.1" type="text/css" media="all">
    <link rel="stylesheet" id="LineIcons-css" href="css/LineIcons.css" type="text/css" media="all">
    <link rel="stylesheet" id="bootstrap-css" href="css/bootstrap.min.css" type="text/css" media="all">
    <link rel="stylesheet" id="animate-css" href="css/animate.min.css" type="text/css" media="all">
    <link rel="stylesheet" id="animsition-css" href="css/animsition.min.css" type="text/css" media="all">
    <link rel="stylesheet" id="fancybox-css" href="css/jquery.fancybox.min.css" type="text/css" media="all">
    <link rel="stylesheet" id="pagepiling-css" href="css/jquery.pagepiling.min.css" type="text/css" media="all">
    <link rel="stylesheet" id="superfish-css" href="css/superfish.css" type="text/css" media="all">
    <link rel="stylesheet" id="swiper-css" href="css/swiper.min.css" type="text/css" media="all">
    <link rel="stylesheet" id="vlt-main-css-css" href="css/vlt-main.min.css?v=1.1" type="text/css" media="all">
    <link rel="stylesheet" id="elementor-icons-css" href="css/elementor-icons.min.css" type="text/css" media="all">
    <link rel="stylesheet" id="elementor-frontend-css" href="css/frontend.min.css" type="text/css" media="all">
    <link rel="stylesheet" id="elementor-post-7-css" href="css/post-7.css" type="text/css" media="all">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <script type="text/javascript" src="js/jquery.min.js" id="jquery-core-js"></script>
    <script type="text/javascript" src="js/jquery-migrate.min.js" id="jquery-migrate-js"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" id="simple-likes-public-js-js-extra">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    </script>
    <script type="text/javascript" src="js/post-like.min.js" id="simple-likes-public-js-js"></script>

    <meta name="generator"
        content="Elementor 3.26.3; settings: css_print_method-external, google_font-enabled, font_display-swap">
    <style type="text/css">
        .recentcomments a {
            display: inline !important;
            padding: 0 !important;
            margin: 0 !important;
        }
    </style>
    <style>
        .e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload),
        .e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload) * {
            background-image: none !important;
        }

        @media screen and (max-height: 1024px) {

            .e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload),
            .e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload) * {
                background-image: none !important;
            }
        }

        @media screen and (max-height: 640px) {

            .e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload),
            .e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload) * {
                background-image: none !important;
            }
        }
    </style>
    <style id="kirki-inline-styles">
        body {
            background: #161616;
            background-color: #161616;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: scroll;
            font-family: Gilroy;
            font-size: 1rem;
            font-weight: 400;
            letter-spacing: 0px;
            line-height: 1.8;
            text-transform: none;
            color: #7d7d7d;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -ms-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        :root {
            --p1: #cf000f;
            --pf: Gilroy;
        }

        ::selection {
            color: #ffffff !important;
            background-color: #cf000f !important;
        }

        ::-moz-selection {
            color: #ffffff !important;
            background-color: #cf000f !important;
        }

        ::-webkit-scrollbar {
            background-color: #161616;
            width: 5px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #cf000f;
        }

        .vlt-header .vlt-navbar-logo img {
            height: 23px;
        }

        h1,
        .h1 {
            font-family: Gilroy;
            font-size: 5rem;
            font-weight: 400;
            letter-spacing: 0px;
            line-height: 1.1;
            text-transform: none;
            color: #ffffff;
        }

        h2,
        .h2 {
            font-family: Gilroy;
            font-size: 4rem;
            font-weight: 400;
            letter-spacing: 0px;
            line-height: 1.1;
            text-transform: none;
            color: #ffffff;
        }

        h3,
        .h3 {
            font-family: Gilroy;
            font-size: 3.125rem;
            font-weight: 400;
            letter-spacing: 0px;
            line-height: 1.35;
            text-transform: none;
            color: #ffffff;
        }

        h4,
        .h4 {
            font-family: Gilroy;
            font-size: 1.75rem;
            font-weight: 400;
            letter-spacing: 0px;
            line-height: 1.5;
            text-transform: none;
            color: #ffffff;
        }

        h5,
        .h5 {
            font-family: Gilroy;
            font-size: 1.375rem;
            font-weight: 400;
            letter-spacing: 0px;
            line-height: 1.5;
            text-transform: none;
            color: #ffffff;
        }

        h6,
        .h6 {
            font-family: Gilroy;
            font-size: .9375rem;
            font-weight: 400;
            letter-spacing: 1px;
            line-height: 1.1;
            text-transform: uppercase;
            color: #ffffff;
        }

        blockquote {
            font-family: Gilroy;
            font-size: 1.25rem;
            font-weight: 700;
            letter-spacing: 0px;
            line-height: 1.8;
            text-transform: none;
            color: #ffffff;
        }

        .vlt-btn {
            font-family: Gilroy;
            font-size: .75rem;
            font-weight: 400;
            letter-spacing: 0px;
            line-height: 1.1;
            text-transform: uppercase;
        }

        input[type="text"],
        input[type="date"],
        input[type="email"],
        input[type="password"],
        input[type="tel"],
        input[type="url"],
        input[type="search"],
        input[type="number"],
        textarea,
        select {
            font-family: Gilroy;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.8;
            text-transform: none;
            color: #ffffff;
        }

        label {
            font-weight: 400;
        }

        /* Blog e Packages: responsivo em mobile */
        @media (max-width: 768px) {
            .blog-page,
            .pkg-page {
                flex-direction: column !important;
                gap: 16px !important;
            }
            .blog-page > div,
            .pkg-page > div {
                flex: none !important;
                width: 100% !important;
            }
        }

        /* === #8 Scroll Indicator === */
        .scroll-indicator-wrap {
            position: absolute;
            bottom: 2.2rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            z-index: 10;
            animation: si-fadeIn 1s ease 2.2s both;
            pointer-events: none;
        }
        .scroll-indicator {
            width: 22px;
            height: 36px;
            border: 1.5px solid rgba(255,255,255,0.28);
            border-radius: 11px;
            position: relative;
        }
        .scroll-indicator-wheel {
            width: 4px;
            height: 7px;
            background: #00b8d4;
            border-radius: 2px;
            position: absolute;
            top: 5px;
            left: 50%;
            transform: translateX(-50%);
            animation: si-wheel 1.8s ease infinite;
        }
        .scroll-indicator-label {
            font-size: 8px;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.28);
            font-family: 'Poppins', sans-serif;
        }
        @keyframes si-wheel {
            0%  { top: 5px; opacity: 1; }
            75% { top: 18px; opacity: 0; }
            100%{ top: 5px; opacity: 0; }
        }
        @keyframes si-fadeIn {
            from { opacity: 0; transform: translateX(-50%) translateY(8px); }
            to   { opacity: 1; transform: translateX(-50%) translateY(0); }
        }
        @media (max-width: 768px) { .scroll-indicator-wrap { display: none; } }

        /* === #10 Blog Skeleton === */
        .skeleton-card {
            flex: 1;
            min-width: 0;
            height: 280px;
            border-radius: 4px;
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.06);
            overflow: hidden;
            position: relative;
        }
        .skeleton-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, transparent 30%, rgba(255,255,255,0.04) 50%, transparent 70%);
            background-size: 200% 100%;
            animation: sk-shimmer 1.4s ease infinite;
        }
        @keyframes sk-shimmer {
            0%   { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }
        #blog-real-content { animation: si-fadeIn2 0.5s ease both; }
        @keyframes si-fadeIn2 {
            from { opacity: 0; } to { opacity: 1; }
        }

        /* === #9 Copy tooltip === */
        .copy-tooltip {
            position: absolute;
            bottom: calc(100% + 6px);
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0,184,212,0.92);
            color: #fff;
            font-size: 10px;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 4px;
            white-space: nowrap;
            letter-spacing: 0.04em;
            pointer-events: none;
            z-index: 100;
            animation: ct-pop 0.2s ease;
        }
        .copy-tooltip::after {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            border: 4px solid transparent;
            border-top-color: rgba(0,184,212,0.92);
        }
        @keyframes ct-pop {
            from { opacity: 0; transform: translateX(-50%) translateY(4px); }
            to   { opacity: 1; transform: translateX(-50%) translateY(0); }
        }
        .copy-contact { cursor: pointer; position: relative; }

        /* === #6 Availability badge === */
        .avail-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgba(22,163,74,0.1);
            border: 1px solid rgba(22,163,74,0.28);
            border-radius: 20px;
            padding: 5px 12px;
            font-size: 0.7rem;
            font-weight: 500;
            color: #4ade80;
            letter-spacing: 0.03em;
            margin-bottom: 1rem;
        }
        .avail-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #4ade80;
            animation: avail-pulse 2s ease infinite;
            flex-shrink: 0;
        }
        @keyframes avail-pulse {
            0%   { box-shadow: 0 0 0 0 rgba(74,222,128,0.5); }
            70%  { box-shadow: 0 0 0 6px rgba(74,222,128,0); }
            100% { box-shadow: 0 0 0 0 rgba(74,222,128,0); }
        }

        /* === #5 Tech stack badges === */
        .pkg-stack-badge {
            display: inline-flex;
            align-items: center;
            gap: 3px;
            padding: 2px 7px;
            border-radius: 4px;
            font-size: 0.6rem;
            font-weight: 500;
            letter-spacing: 0.04em;
        }
        .pkg-stack-badge.laravel {
            background: rgba(255,79,61,0.12);
            border: 1px solid rgba(255,79,61,0.25);
            color: #ff614d;
        }
        .pkg-stack-badge.php {
            background: rgba(97,129,255,0.12);
            border: 1px solid rgba(97,129,255,0.25);
            color: #7c8fff;
        }
    </style>
</head>

<body
    class="home page-template page-template-template-fullpage-slider page-template-template-fullpage-slider-php page page-id-48 wp-embed-responsive no-mobile animsition elementor-default elementor-kit-7 elementor-page elementor-page-48">


    <div class="vlt-fixed-socials">
        <a class="vlt-social-icon vlt-social-icon--style-1" href="https://linkedin.com/in/arnaldo-tomo" target="_blank"><i
                class="lnir-linkedin"></i></a><a class="vlt-social-icon vlt-social-icon--style-1" href="https://github.com/arnaldo-tomo"
            target="_blank">
                    <i class="lnir-github-original"></i></a><a class="vlt-social-icon vlt-social-icon--style-1"
            href="https://instagram.com/arnaldo_tomo/" target="_blank"><i class="lnir-instagram"></i></a></div>
    {{-- header.blade.php - com links atualizados --}}
    <header class="vlt-header">
        <div class="vlt-navbar vlt-navbar--main vlt-navbar--transparent vlt-navbar--sticky">
            <div class="vlt-navbar-background"></div>
            <div class="vlt-navbar-inner">
                <div class="vlt-navbar-inner--left">
                    <a href="/{{ app()->getLocale() }}">
                        <img src="{{ asset('images/brandwhite.webp') }}" width="200px" alt="Arnaldo Tomo" class="black">
                    </a>
                </div>
                <div class="vlt-navbar-inner--center">
                    <div class="container">
                        <nav class="vlt-default-menu__navigation">
                            <ul id="menu-onepage-menu" class="sf-menu sf-menu-onepage">
                                <li id="menu-item-30"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-30"
                                    data-menuanchor="Home">
                                    <a href="#Home">{{ __('menu.home') }}</a>
                                </li>
                                <li id="menu-item-31"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-31"
                                    data-menuanchor="About">
                                    <a href="#About">{{ __('menu.about') }}</a>
                                </li>
                                <li id="menu-item-32"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-32"
                                    data-menuanchor="Projects">
                                    <a href="#Projects">{{ __('menu.projects') }}</a>
                                </li>
                                <li id="menu-item-33"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-33"
                                    data-menuanchor="Education">
                                    <a href="#Education">{{ __('menu.education') }}</a>
                                </li>
                                <li id="menu-item-34"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-34"
                                    data-menuanchor="Testimonials">
                                    <a href="#Testimonials">{{ __('menu.testimonials') }}</a>
                                </li>

                                <li id="menu-item-36"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-36"
                                    data-menuanchor="Blog">
                                    <a href="#Blog" style="position:relative;">{{ __('menu.blog') }}<span style="position:absolute;top:18px;right:-10px;display:inline-flex;align-items:center;justify-content:center;background:#00b8d479;color:#fff;font-size:0.55rem;font-weight:700;min-width:16px;height:16px;padding:0 4px;border-radius:20px;line-height:1;">{{ count($posts) }}</span></a>
                                </li>
                                <li id="menu-item-38"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-38"
                                    data-menuanchor="Packages">
                                    <a href="#Packages" style="position:relative;">{{ __('menu.packages') }}<span style="position:absolute;top:18px;right:-10px;display:inline-flex;align-items:center;justify-content:center;background:#00b8d47b;color:#fff;font-size:0.55rem;font-weight:700;min-width:16px;height:16px;padding:0 4px;border-radius:20px;line-height:1;">{{ count($packages) }}</span></a>
                                </li>
                                <li id="menu-item-37"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-37"
                                    data-menuanchor="Contact">
                                    <a href="#Contact">{{ __('menu.contact') }}</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="vlt-navbar-inner--right">
                    <div class="d-flex align-items-center">
                        {{-- Seletor de idioma actualizado --}}

                        <div class="language-switcher">
                            @foreach(config('app.available_locales') as $localeCode => $languageName)
                            <a href="{{ url($localeCode) }}"
                                class="lang-link {{ app()->getLocale() == $localeCode ? 'active' : '' }}"
                                title="{{ $languageName }}">
                                {{ strtoupper($localeCode) }}
                            </a>
                            @endforeach
                        </div>
                        <nav class="vlt-navbar-contacts">
                            <ul id="menu-navbar-menu" class="menu">
                                <li id="menu-item-12"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-12">
                                    <a href="tel:+258846474687">(+258) 84 6474 687</a>
                                </li>
                            </ul>
                        </nav>
                        <a class="vlt-menu-burger js-offcanvas-menu-open" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square"
                                stroke-linejoin="round">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </header>

    @include('components.hackher')

    @include('components.toaste')

    @include('components.privacidade')


    <div class="vlt-offcanvas-menu">

        <nav class="vlt-offcanvas-menu__navigation">

            <ul id="menu-onepage-menu-1" class="sf-menu sf-menu-onepage">
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-30" data-menuanchor="Home">
                    <a href="#Home">{{ __('menu.home') }}</a>
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-31"
                    data-menuanchor="About"><a href="#About">{{ __('menu.about') }}</a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-32"
                    data-menuanchor="Projects"><a href="#Projects">{{ __('menu.projects') }}</a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-33"
                    data-menuanchor="Education"><a href="#Education">{{ __('menu.education') }}</a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-34"
                    data-menuanchor="Testimonials"><a href="#Testimonials">{{ __('menu.testimonials') }}</a></li>

                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-36" data-menuanchor="Blog">
                    <a href="#Blog" style="position:relative;">{{ __('menu.blog') }}<span style="position:absolute;top:-8px;right:-10px;display:inline-flex;align-items:center;justify-content:center;background:#00b8d4;color:#fff;font-size:0.55rem;font-weight:700;min-width:16px;height:16px;padding:0 4px;border-radius:20px;line-height:1;">{{ count($posts) }}</span></a>
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-38" data-menuanchor="Packages">
                    <a href="#Packages" style="position:relative;">{{ __('menu.packages') }}<span style="position:absolute;top:-8px;right:-10px;display:inline-flex;align-items:center;justify-content:center;background:#00b8d4;color:#fff;font-size:0.55rem;font-weight:700;min-width:16px;height:16px;padding:0 4px;border-radius:20px;line-height:1;">{{ count($packages) }}</span></a>
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-37"
                    data-menuanchor="Contact"><a href="#Contact">{{ __('menu.contact') }}</a></li>
            </ul>
        </nav>


        <div class="vlt-offcanvas-menu__footer">

            <div class="vlt-offcanvas-menu__socials">

                <a class="vlt-social-icon vlt-social-icon--style-1" href="#" target="_blank"><i lass="lnir-facebook-filled"></i></a>
                <a class="vlt-social-icon vlt-social-icon--style-1" href="#" target="_blank"><i class="lnir-github-original"></i></a>
                <a class="vlt-social-icon vlt-social-icon--style-1" href="#" target="_blank"><i class="lnir-instagram"></i></a>
            </div>

            <div class="vlt-offcanvas-menu__copyright">
                <p>© {{ date('Y') }} Copiright.<br>All rights reserved.</p>
            </div>


        </div>


    </div>

    <div class="vlt-site-overlay"></div>
    <main class="vlt-main">

        <div class="vlt-fullpage-slider" data-loop-top data-loop-bottom data-speed="0">

            <div class="vlt-section pp-scrollable" data-anchor="Home" style>

                <div class="vlt-section__vertical-align">

                    <div class="vlt-section__content">

                        <div class="vlt-section__ken-burn-background has-mobile-image">

                            <img src="images/home.png" alt="background" loading="lazy">

                            <img src="images/home-mobile.jpg" alt="background" loading="lazy">

                        </div>


                        <div class="container p-0">

                            <div data-elementor-type="wp-post" data-elementor-id="28" class="elementor elementor-28">
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-ac63f0c elementor-section-boxed elementor-section-height-default"
                                    data-id="ac63f0c" data-element_type="section" data-settings="{" background_background":"classic"}"="">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-8001a0a"
                                            data-id="8001a0a" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-95bd625 elementor-widget elementor-widget-spacer"
                                                    data-id="95bd625" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"none"}"=""
                                                    data-widget_type="spacer.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-spacer">
                                                            <div class="elementor-spacer-inner"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="elementor-element elementor-element-2f01fb8 elementor-widget elementor-widget-spacer"
                                                    data-id="2f01fb8" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"none"}"=""
                                                    data-widget_type="spacer.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-spacer">
                                                            <div class="elementor-spacer-inner"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="elementor-element elementor-element-d219f36 elementor-widget elementor-widget-spacer"
                                                    data-id="d219f36" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"none"}"=""
                                                    data-widget_type="spacer.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-spacer">
                                                            <div class="elementor-spacer-inner"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="vlt-animate-element elementor-element elementor-element-81c1dfc elementor-widget elementor-widget-html"
                                                    data-animation-name="fadeInUpSm" style=" --animate-delay: 200ms;"
                                                    data-id="81c1dfc" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"fadeinupsm"}"=""
                                                    data-widget_type="html.default">
                                                    <div class="elementor-widget-container">
                                                        <h1 class="vlt-large-heading text-uppercase small-heading">
                                                            {!! __('messages.software_engineer') !!}
                                                        </h1>

                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-6bdbcfa elementor-widget elementor-widget-spacer"
                                                    data-id="6bdbcfa" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"none"}"=""
                                                    data-widget_type="spacer.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-spacer">
                                                            <div class="elementor-spacer-inner"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="vlt-animate-element elementor-element elementor-element-6d17e11 elementor-widget__width-initial elementor-widget elementor-widget-text-editor"
                                                    data-animation-name="fadeInUpSm" style=" --animate-delay: 300ms;"
                                                    data-id="6d17e11" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"fadeinupsm"}"=""
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        {{ __('messages.tagline') }}
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                        </div>


                    </div>

                    {{-- #8 Scroll Indicator --}}
                    <div class="scroll-indicator-wrap">
                        <div class="scroll-indicator">
                            <div class="scroll-indicator-wheel"></div>
                        </div>
                        <span class="scroll-indicator-label">Scroll</span>
                    </div>

                </div>


            </div>


            <div class="vlt-section pp-scrollable" data-anchor="About" style>

                <div class="vlt-section__vertical-align">

                    <div class="vlt-section__content">

                        <div class="container p-0">

                            <div data-elementor-type="wp-post" data-elementor-id="26" class="elementor elementor-26">

                                <section class="experience-section">
                                    <div class="blur-background"></div>
                                    <div class="container">

                                        <div class="experience-grid">

                                            <div class="about-column">
                                            <h2 class="section-title">{!! __('messages.about_title') !!}</h2>
                                            <div class="about-content">
                                                <p>{!! __('messages.about_paragraph_1') !!}</p>
                                                <p>{!! __('messages.about_paragraph_2') !!}</p>
                                            </div>
                                        </div>


                                            <div class="counter-column">
                                                <div class="experience-counter">
                                                    <div class="counter-digits">
                                                        <div class="digit-container">
                                                            <span class="digit">7</span>
                                                        </div>
                                                    </div>
                                                    <div class="counter-details">
                                                        <div class="counter-separator">
                                                            <span></span>
                                                        </div>
                                                        <div class="counter-labels">
                                                            <span class="counter-label">{!! __('messages.years') !!}</span>
                                                            <span class="counter-value">{!! __('messages.experience') !!}</span>
                                                            <span class="counter-sublabel">{!! __('messages.developing') !!}</span>
                                                            <span class="counter-sublabel">{!! __('messages.solutions') !!}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Stack Tecnológico -->
                                        <div class="tech-stack-section">
                                            <h3 class="tech-stack-title">{!! __('messages.tech_stack_title') !!}</h3>

                                            <div class="tech-categories">
                                                <div class="category-tabs">
                                                    <button class="tab-button active" data-tab="backend">Backend</button>
                                                    <button class="tab-button" data-tab="frontend">Frontend</button>
                                                    <button class="tab-button" data-tab="mobile">Mobile</button>
                                                    <button class="tab-button" data-tab="design">Design &  DevOps</button>
                                                </div>

                                                <div class="tech-tabs-content">
                                                    <!-- Backend Tab -->
                                                    <div class="tab-content active" id="backend-tab">
                                                        <div class="tech-cards">
                                                            <div class="tech-card">
                                                                <div class="tech-icon">
                                                                    <img src="https://cdn.worldvectorlogo.com/logos/laravel-2.svg"
                                                                        alt="Laravel">
                                                                </div>
                                                                <h5>Laravel</h5>
                                                                <div class="tech-dots">
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                </div>
                                                            </div>

                                                            <div class="tech-card">
                                                                <div class="tech-icon">
                                                                    <img src="images/mysql.png" alt="MySQL">
                                                                </div>
                                                                <h5>MySQL</h5>
                                                                <div class="tech-dots">
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot"></span>
                                                                </div>
                                                            </div>

                                                            <div class="tech-card">
                                                                <div class="tech-icon">
                                                                    <img src="https://cdn.worldvectorlogo.com/logos/nodejs-icon.svg"
                                                                        alt="Node.js">
                                                                </div>
                                                                <h5>Node.js</h5>
                                                                <div class="tech-dots">
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot"></span>
                                                                    <span class="dot"></span>
                                                                </div>
                                                            </div>

                                                            <div class="tech-card">
                                                                <div class="tech-icon">
                                                                    <img src="https://cdn.worldvectorlogo.com/logos/python-5.svg"
                                                                        alt="Python">
                                                                </div>
                                                                <h5>Python</h5>
                                                                <div class="tech-dots">
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot"></span>
                                                                    <span class="dot"></span>
                                                                    <span class="dot"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Frontend Tab -->
                                                    <div class="tab-content" id="frontend-tab">
                                                        <div class="tech-cards">
                                                            <div class="tech-card">
                                                                <div class="tech-icon">
                                                                    <img src="https://cdn.worldvectorlogo.com/logos/react-2.svg"
                                                                        alt="React">
                                                                </div>
                                                                <h5>React</h5>
                                                                <div class="tech-dots">
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot"></span>
                                                                </div>
                                                            </div>

                                                            <div class="tech-card">
                                                                <div class="tech-icon">
                                                                    <img src="https://cdn.worldvectorlogo.com/logos/javascript-1.svg"
                                                                        alt="JavaScript">
                                                                </div>
                                                                <h5>JavaScript</h5>
                                                                <div class="tech-dots">
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                </div>
                                                            </div>

                                                            <div class="tech-card">
                                                                <div class="tech-icon">
                                                                    <img src="https://cdn.worldvectorlogo.com/logos/tailwindcss.svg"
                                                                        alt="Tailwind CSS">
                                                                </div>
                                                                <h5>Tailwind CSS</h5>
                                                                <div class="tech-dots">
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot"></span>
                                                                </div>
                                                            </div>

                                                            <div class="tech-card">
                                                                <div class="tech-icon">
                                                                    <img src="https://cdn.worldvectorlogo.com/logos/bootstrap-5-1.svg"
                                                                        alt="Bootstrap">
                                                                </div>
                                                                <h5>Bootstrap</h5>
                                                                <div class="tech-dots">
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Mobile Tab -->
                                                    <div class="tab-content" id="mobile-tab">
                                                        <div class="tech-cards">
                                                            <div class="tech-card">
                                                                <div class="tech-icon">
                                                                    <img src="https://cdn.worldvectorlogo.com/logos/react-native-1.svg"
                                                                        alt="React Native">
                                                                </div>
                                                                <h5>React Native</h5>
                                                                <div class="tech-dots">
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                </div>
                                                            </div>

                                                            <div class="tech-card">
                                                                <div class="tech-icon">
                                                                    <img src="https://cdn.worldvectorlogo.com/logos/flutter.svg"
                                                                        alt="Flutter">
                                                                </div>
                                                                <h5>Flutter</h5>
                                                                <div class="tech-dots">
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot"></span>
                                                                    <span class="dot"></span>
                                                                    <span class="dot"></span>
                                                                </div>
                                                            </div>

                                                            <div class="tech-card">
                                                                <div class="tech-icon">
                                                                    <img src="https://images.icon-icons.com/2389/PNG/512/expo_logo_icon_145293.png"
                                                                        alt="Swift">
                                                                </div>
                                                                <h5>Expo</h5>
                                                                <div class="tech-dots">
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot"></span>
                                                                    <span class="dot"></span>
                                                                    <span class="dot"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Design & DevOps Tab -->
                                                    <div class="tab-content" id="design-tab">
                                                        <div class="tech-cards">
                                                            <div class="tech-card">
                                                                <div class="tech-icon">
                                                                    <img src="https://upload.wikimedia.org/wikipedia/commons/3/33/Figma-logo.svg"
                                                                        alt="Figma">
                                                                </div>
                                                                <h5>Figma</h5>
                                                                <div class="tech-dots">
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot"></span>
                                                                </div>
                                                            </div>

                                                            <div class="tech-card">
                                                                <div class="tech-icon">
                                                                    <img src="https://cdn.worldvectorlogo.com/logos/git-icon.svg"
                                                                        alt="Git">
                                                                </div>
                                                                <h5>Git</h5>
                                                                <div class="tech-dots">
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot"></span>
                                                                </div>
                                                            </div>

                                                            <div class="tech-card">
                                                                <div class="tech-icon">
                                                                    <img src="https://cdn.worldvectorlogo.com/logos/docker.svg"
                                                                        alt="Docker">
                                                                </div>
                                                                <h5>Docker</h5>
                                                                <div class="tech-dots">
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot"></span>
                                                                    <span class="dot"></span>
                                                                </div>
                                                            </div>

                                                            <div class="tech-card">
                                                                <div class="tech-icon">
                                                                    <img src="https://cdn.worldvectorlogo.com/logos/firebase-1.svg"
                                                                        alt="Firebase">
                                                                </div>
                                                                <h5>Firebase</h5>
                                                                <div class="tech-dots">
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot filled"></span>
                                                                    <span class="dot"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>


                            </div>

                        </div>
                        <!-- /.container -->

                    </div>
                    <!-- /.vlt-section__content -->

                </div>
                <!-- /.vlt-section__vertical-align -->

            </div>
            <!-- /.vlt-section -->

            <div class="vlt-section pp-scrollable" data-anchor="Projects" style>

                <div class="vlt-section__vertical-align">

                    <div class="vlt-section__content">

                        <div class="vlt-section__projects-background"></div>
                        <!-- /.vlt-section__projects-background -->

                        <div class="container p-0">

                            <div data-elementor-type="wp-post" data-elementor-id="24" class="elementor elementor-24">
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-d20eac0 elementor-section-boxed elementor-section-height-default"
                                    data-id="d20eac0" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7dcd8a4"
                                            data-id="7dcd8a4" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-6ba92a3 elementor-widget elementor-widget-spacer"
                                                    data-id="6ba92a3" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"none"}"=""
                                                    data-widget_type="spacer.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-spacer">
                                                            <div class="elementor-spacer-inner"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="vlt-animate-element elementor-element elementor-element-dca4088 elementor-widget elementor-widget-vlt-portfolio-slider"
                                                    data-animation-name="fadeInUpSm" style data-id="dca4088"
                                                    data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"fadeinupsm"}"=""
                                                    data-widget_type="vlt-portfolio-slider.default">
                                                    <div class="elementor-widget-container">

                                                        <div class="vlt-portfolio-slider"
                                                            data-navigation-anchor=".vlt-portfolio-controls">

                                                            <div class="swiper-container swiper">

                                                                <div class="swiper-wrapper">

                                                                    @foreach($projects as $project)
                                                                    <div class="swiper-slide">

                                                                        <article
                                                                            class="vlt-project portfolio type-portfolio status-publish has-post-thumbnail hentry"
                                                                            data-image="{{ $project->image ? (Str::startsWith($project->image, 'http') ? $project->image : asset($project->image)) : '' }}">

                                                                            <h3 class="vlt-project-title">{{ $project->title }}<span class="has-accent-color">.</span></h3>

                                                                            <div class="vlt-project-excerpt">

                                                                                <p>{!! $project->description !!}</p>
                                                                                @if($project->features && count($project->features) > 0)
                                                                                <strong style="color: #00b8d4" class="text-uppercase">{!! __('messages.main_features') !!}</strong>
                                                                                <ul class="list-unstyled">
                                                                                    @foreach($project->features as $feature)
                                                                                    <li style="display: hidden"><i class="fa fa-check" aria-hidden="true" style="color: #00b8d4"></i> {{ $feature }}</li>
                                                                                    @endforeach
                                                                                </ul>
                                                                                @endif
                                                                                <div class="nado">
                                                                                    @if($project->playstore_link)
                                                                                    <a href="{{ $project->playstore_link }}" target="_blank">
                                                                                        <img width="150" src="/images/splaystore.png">
                                                                                    </a>
                                                                                    @endif
                                                                                    @if($project->appstore_link)
                                                                                    <a href="{{ $project->appstore_link }}" target="_blank">
                                                                                        <img width="150" src="/images/apple.png">
                                                                                    </a>
                                                                                    @endif
                                                                                    @if(!empty($project->website_url))
                                                                                    <a href="{{ $project->website_url }}" target="_blank" rel="noopener"
                                                                                       style="display:inline-flex;align-items:center;gap:6px;margin-top:0.75rem;
                                                                                              padding:0.45rem 1rem;border-radius:6px;font-size:0.75rem;font-weight:500;
                                                                                              border:1px solid rgba(0,184,212,0.4);background:rgba(0,184,212,0.1);
                                                                                              color:#00b8d4;text-decoration:none;transition:all 0.2s;letter-spacing:0.04em;"
                                                                                       onmouseover="this.style.background='rgba(0,184,212,0.2)';this.style.borderColor='rgba(0,184,212,0.7)'"
                                                                                       onmouseout="this.style.background='rgba(0,184,212,0.1)';this.style.borderColor='rgba(0,184,212,0.4)'">
                                                                                        <svg style="width:13px;height:13px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                                                                        </svg>
                                                                                        Visitar Site
                                                                                    </a>
                                                                                    @endif
                                                                                </div>
                                                                            </div>

                                                                        </article>

                                                                    </div>
                                                                    @endforeach

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-f4906ce elementor-widget elementor-widget-spacer"
                                                    data-id="f4906ce" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"none"}"=""
                                                    data-widget_type="spacer.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-spacer">
                                                            <div class="elementor-spacer-inner"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="vlt-animate-element elementor-element elementor-element-761e3fb vlt-portfolio-controls elementor-widget elementor-widget-vlt-slider-controls"
                                                    data-animation-name="fadeInUpSm" style=" --animate-delay: 100ms;"
                                                    data-id="761e3fb" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"fadeinupsm"}"=""
                                                    data-widget_type="vlt-slider-controls.default">
                                                    <div class="elementor-widget-container">

                                                        <div class="vlt-slider-controls vlt-slider-controls--style-1">

                                                            <div class="vlt-swiper-pagination"></div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-5f262fd vlt-portfolio-controls elementor-absolute elementor-widget elementor-widget-vlt-slider-controls"
                                                    data-id="5f262fd" data-element_type="widget" data-settings="{"
                                                    _position":"absolute","vlt_animated_widget_animation":"none"}"=""
                                                    data-widget_type="vlt-slider-controls.default">
                                                    <div class="elementor-widget-container">

                                                        <div class="vlt-slider-controls vlt-slider-controls--style-2">

                                                            <div class="vlt-swiper-button-prev">

                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 45">
                                                                    <defs></defs>
                                                                    <path fill="currentColor" fill-rule="evenodd"
                                                                        d="M1.36413 22.5795L24 43.9524l-.7271.6865L.272896 22.9223l.383716-.3623-.362754-.3367L23.0941.319721l.733.680233L1.36413 22.5795z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>

                                                            </div>

                                                            <div class="vlt-swiper-button-next">

                                                                <svg fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 45">
                                                                    <defs></defs>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M22.6359 22.3728L0 1.00001.727101.313477 23.7271 22.0301l-.3837.3623.3627.3367L.905866 44.6327l-.732997-.6803L22.6359 22.3728z"
                                                                        fill="currentColor"></path>
                                                                </svg>

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                        </div>
                        <!-- /.container -->

                    </div>
                    <!-- /.vlt-section__content -->

                </div>
                <!-- /.vlt-section__vertical-align -->

            </div>
            <!-- /.vlt-section -->

            <div class="vlt-section pp-scrollable" data-anchor="Education" style>

                <div class="vlt-section__vertical-align">

                    <div class="vlt-section__content">

                        <div class="container p-0">

                            <div data-elementor-type="wp-post" data-elementor-id="22" class="elementor elementor-22">
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-f357390 elementor-section-boxed elementor-section-height-default"
                                    data-id="f357390" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1de251a"
                                            data-id="1de251a" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-d3ea8ed elementor-widget elementor-widget-spacer"
                                                    data-id="d3ea8ed" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"none"}"=""
                                                    data-widget_type="spacer.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-spacer">
                                                            <div class="elementor-spacer-inner"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-7e459fc elementor-section-content-middle elementor-section-boxed elementor-section-height-default"
                                    data-id="7e459fc" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-482f790"
                                            data-id="482f790" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="vlt-animate-element elementor-element elementor-element-43eb7ac elementor-widget elementor-widget-heading"
                                                    data-animation-name="fadeInUpSm" style data-id="43eb7ac"
                                                    data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"fadeinupsm"}"=""
                                                    data-widget_type="heading.default">
                                                    <div class="elementor-widget-container">
                                                        <h3 class="elementor-heading-title elementor-size-default">
                                                            Education</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-1799464"
                                            data-id="1799464" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="vlt-animate-element elementor-element elementor-element-35978a8 elementor-widget elementor-widget-vlt-button"
                                                    data-animation-name="fadeInUpSm" style data-id="35978a8"
                                                    data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"fadeinupsm"}"=""
                                                    data-widget_type="vlt-button.default">
                                                    <div class="elementor-widget-container">

                                                        <a class="vlt-btn vlt-btn--primary" role="button" href="#">

                                                            Download Resume
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-8bf7a06 elementor-section-boxed elementor-section-height-default"
                                    data-id="8bf7a06" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-a5bcbde"
                                            data-id="a5bcbde" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-d7ea4be elementor-widget elementor-widget-spacer"
                                                    data-id="d7ea4be" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"none"}"=""
                                                    data-widget_type="spacer.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-spacer">
                                                            <div class="elementor-spacer-inner"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="vlt-animate-element elementor-element elementor-element-67e92c9 elementor-widget elementor-widget-vlt-timeline-slider"
                                                    data-animation-name="fadeInUpSm" style=" --animate-delay: 100ms;"
                                                    data-id="67e92c9" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"fadeinupsm"}"=""
                                                    data-widget_type="vlt-timeline-slider.default">
                                                    <div class="elementor-widget-container">

                                                        <div class="vlt-timeline-slider"
                                                            data-navigation-anchor=".vlt-timeline-anchor">

                                                            <div class="swiper-container swiper">

                                                                <div class="swiper-wrapper">

                                                                    @foreach($education->chunk(3) as $slide)
                                                                    <div class="swiper-slide">
                                                                        @foreach($slide as $item)
                                                                        <div class="vlt-timeline-item">
                                                                            <div class="row">
                                                                                <div class="col-xl-4">
                                                                                    @if($item->logo)
                                                                                    <img loading="lazy" decoding="async" width="79" height="49" style="border-radius: 5px"
                                                                                        src="{{ Str::startsWith($item->logo, 'http') ? $item->logo : asset($item->logo) }}"
                                                                                        alt="{{ $item->title }}">
                                                                                    @endif
                                                                                </div>
                                                                                <div class="col-xl-4">
                                                                                    <div class="vlt-timeline-item__date">{{ $item->period }}</div>
                                                                                    <h5 class="vlt-timeline-item__title">{{ $item->title }}</h5>
                                                                                </div>
                                                                                <div class="col-xl-4">
                                                                                    <div
                                                                                        class="vlt-timeline-item__text">
                                                                                        <p>{!! $item->description !!}</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                                                                                                @endforeach
                                                                    </div>
                                                                    @endforeach

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-f152810 elementor-widget elementor-widget-spacer"
                                                    data-id="f152810" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"none"}"=""
                                                    data-widget_type="spacer.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-spacer">
                                                            <div class="elementor-spacer-inner"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="vlt-animate-element elementor-element elementor-element-c3f0bc0 vlt-timeline-anchor elementor-widget elementor-widget-vlt-slider-controls"
                                                    data-animation-name="fadeInUpSm" style=" --animate-delay: 200ms;"
                                                    data-id="c3f0bc0" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"fadeinupsm"}"=""
                                                    data-widget_type="vlt-slider-controls.default">
                                                    <div class="elementor-widget-container">

                                                        <div class="vlt-slider-controls vlt-slider-controls--style-1">

                                                            <div class="vlt-swiper-pagination"></div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-d445609 vlt-timeline-anchor elementor-absolute elementor-widget elementor-widget-vlt-slider-controls"
                                                    data-id="d445609" data-element_type="widget" data-settings="{"
                                                    _position":"absolute","vlt_animated_widget_animation":"none"}"=""
                                                    data-widget_type="vlt-slider-controls.default">
                                                    <div class="elementor-widget-container">

                                                        <div class="vlt-slider-controls vlt-slider-controls--style-2">

                                                            <div class="vlt-swiper-button-prev">

                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 45">
                                                                    <defs></defs>
                                                                    <path fill="currentColor" fill-rule="evenodd"
                                                                        d="M1.36413 22.5795L24 43.9524l-.7271.6865L.272896 22.9223l.383716-.3623-.362754-.3367L23.0941.319721l.733.680233L1.36413 22.5795z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>

                                                            </div>

                                                            <div class="vlt-swiper-button-next">

                                                                <svg fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 45">
                                                                    <defs></defs>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M22.6359 22.3728L0 1.00001.727101.313477 23.7271 22.0301l-.3837.3623.3627.3367L.905866 44.6327l-.732997-.6803L22.6359 22.3728z"
                                                                        fill="currentColor"></path>
                                                                </svg>

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                            </div>

                        </div>
                        <!-- /.container -->

                    </div>
                    <!-- /.vlt-section__content -->

                </div>
                <!-- /.vlt-section__vertical-align -->

            </div>
            <!-- /.vlt-section -->

            <div class="vlt-section pp-scrollable" data-anchor="Testimonials" style>

                <div class="vlt-section__vertical-align">

                    <div class="vlt-section__content">

                        <div class="vlt-section__ken-burn-background">

                            <img src="images/testimonials.jpg" alt="background" loading="lazy">

                        </div>
                        <!-- /.vlt-section__ken-burn-background -->

                        <div class="container p-0">

                            <div data-elementor-type="wp-post" data-elementor-id="20" class="elementor elementor-20">

                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-d38a1fa elementor-section-content-bottom elementor-section-boxed elementor-section-height-default"
                                    data-id="d38a1fa" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-d87e80d"
                                            data-id="d87e80d" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="vlt-animate-element elementor-element elementor-element-8eb0c0f elementor-widget elementor-widget-html"
                                                    data-animation-name="fadeInUpSm" style data-id="8eb0c0f"
                                                    data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"fadeinupsm"}"=""
                                                    data-widget_type="html.default">

                                                </div>

                                                <div class="vlt-animate-element elementor-element elementor-element-2faa764 elementor-widget elementor-widget-heading"
                                                    data-animation-name="fadeInUpSm" style data-id="2faa764"
                                                    data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"fadeinupsm"}"=""
                                                    data-widget_type="heading.default">
                                                    <div class="elementor-widget-container">
                                                        <h3 class="elementor-heading-title elementor-size-default">{!! __('messages.testimonials_title') !!}</h3>
                                                        <p class="text-white">{!! __('messages.testimonials_description') !!}</p>
                                                    </div>
                                                </div>
                                                <div class="elementor-widget-container">
                                                    <div class="has-accent-color"><svg
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 75 75" style="height: 75px;">
                                                            <defs></defs>
                                                            <path fill="currentColor"
                                                                d="M25 0C16.9271 0 10.7422 2.14844 6.44531 6.44531 2.14844 10.7422 0 16.9271 0 25v50h31.25V25H12.5c0-4.4271.9766-7.6172 2.9297-9.5703C17.3828 13.4766 20.5729 12.5 25 12.5V0zm43.75 0c-8.0729 0-14.2578 2.14844-18.5547 6.44531C45.8984 10.7422 43.75 16.9271 43.75 25v50H75V25H56.25c0-4.4271.9766-7.6172 2.9297-9.5703C61.1328 13.4766 64.3229 12.5 68.75 12.5V0z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-f183c9b"
                                            data-id="f183c9b" data-element_type="column">
                                            <div class="elementor-widget-wrap">
                                            </div>
                                        </div>
                                        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-039d35e"
                                            data-id="039d35e" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="vlt-animate-element elementor-element elementor-element-372930a elementor-widget elementor-widget-vlt-testimonial-slider"
                                                    data-animation-name="fadeInUpSm" style=" --animate-delay: 100ms;"
                                                    data-id="372930a" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"fadeinupsm"}"=""
                                                    data-widget_type="vlt-testimonial-slider.default">
                                                    <div class="elementor-widget-container">

                                                        <div class="vlt-testimonial-slider"
                                                            data-navigation-anchor=".vlt-testimonial-controls">

                                                            <div class="swiper-container swiper">

                                                                <div class="swiper-wrapper">

                                                                    @foreach($testimonials as $testimonial)
                                                                    <div class="swiper-slide">
                                                                        <div class="vlt-testimonial">

                                                                            <div class="vlt-testimonial__text">{!! $testimonial->content !!}</div>

                                                                            <div class="nado vlt-testimonial__meta">

                                                                                <div class="testimonial-avatar">
                                                                                    @if($testimonial->linkedin_url)
                                                                                    <a href="{{ $testimonial->linkedin_url }}" target="_blank">
                                                                                    @endif
                                                                                        <img src="{{ $testimonial->avatar ? asset($testimonial->avatar) : '' }}" alt="{{ $testimonial->name }}" class="testimonial-image">
                                                                                    @if($testimonial->linkedin_url)
                                                                                    </a>
                                                                                    @endif
                                                                                </div>

                                                                                <div>
                                                                                    <div class="hore">
                                                                                        <h5 class="vlt-testimonial__name">{{ $testimonial->name }}</h5>
                                                                                        @if($testimonial->linkedin_url)
                                                                                        <div class="linkedin-icon">
                                                                                            <a href="{{ $testimonial->linkedin_url }}" target="_blank">
                                                                                                <i class="fab fa-linkedin"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                        @endif
                                                                                    </div>
                                                                                    <div style="color: #a1a1a1">{{ $testimonial->title }}</div>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                            </div>
                                                <div class="elementor-element elementor-element-6d71bd5 elementor-widget elementor-widget-spacer"
                                                    data-id="6d71bd5" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"none"}"=""
                                                    data-widget_type="spacer.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-spacer">
                                                            <div class="elementor-spacer-inner"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="vlt-animate-element elementor-element elementor-element-3c9168c vlt-testimonial-controls elementor-widget elementor-widget-vlt-slider-controls"
                                                    data-animation-name="fadeInUpSm" style=" --animate-delay: 200ms;"
                                                    data-id="3c9168c" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"fadeinupsm"}"=""
                                                    data-widget_type="vlt-slider-controls.default">
                                                    <div class="elementor-widget-container">

                                                        <div class="vlt-slider-controls vlt-slider-controls--style-1">

                                                            <div class="vlt-swiper-button-prev">

                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 45">
                                                                    <defs></defs>
                                                                    <path fill="currentColor" fill-rule="evenodd"
                                                                        d="M1.36413 22.5795L24 43.9524l-.7271.6865L.272896 22.9223l.383716-.3623-.362754-.3367L23.0941.319721l.733.680233L1.36413 22.5795z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>

                                                            </div>

                                                            <div class="vlt-swiper-button-next">

                                                                <svg fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 45">
                                                                    <defs></defs>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M22.6359 22.3728L0 1.00001.727101.313477 23.7271 22.0301l-.3837.3623.3627.3367L.905866 44.6327l-.732997-.6803L22.6359 22.3728z"
                                                                        fill="currentColor"></path>
                                                                </svg>

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                            </div>

                        </div>
                        <!-- /.container -->

                    </div>
                    <!-- /.vlt-section__content -->

                </div>
                <!-- /.vlt-section__vertical-align -->

            </div>
            <!-- /.vlt-section -->




            <div class="vlt-section pp-scrollable" data-anchor="Blog" style>

                <div class="vlt-section__vertical-align">

                    <div class="vlt-section__content">

                        <div class="container p-0">

                            <div class="elementor elementor-16">
                                <section class="elementor-section elementor-top-section elementor-section-boxed">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-column elementor-col-100 elementor-top-column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="vlt-animate-element elementor-widget elementor-widget-heading" data-animation-name="fadeInUpSm" style>
                                                    <div class="elementor-widget-container">
                                                        <h3 class="elementor-heading-title elementor-size-default">Reflexões &amp; Insights</h3>
                                                    </div>
                                                </div>
                                                <div class="elementor-widget elementor-widget-spacer">
                                                    <div class="elementor-widget-container"><div class="elementor-spacer"><div class="elementor-spacer-inner"></div></div></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section class="elementor-section elementor-top-section elementor-section-boxed">
                                    <div class="elementor-container elementor-column-gap-extended">

                                        @if(count($posts) > 0)
                                        @php $blogPages = array_chunk($posts, 3); $totalBlogPages = count($blogPages); @endphp

                                        {{-- #10 Skeleton loading --}}
                                        <div id="blog-skeleton-wrap" style="width:100%;display:flex;gap:24px;">
                                            <div class="skeleton-card"></div>
                                            <div class="skeleton-card"></div>
                                            <div class="skeleton-card"></div>
                                        </div>

                                        <div id="blog-real-content" style="display:none;width:100%;position:relative;">

                                            {{-- Pages --}}
                                            @foreach($blogPages as $pageIdx => $pagePosts)
                                            <div class="blog-page" data-page="{{ $pageIdx }}"
                                                 style="{{ $pageIdx === 0 ? 'display:flex;' : 'display:none;' }} gap:24px; align-items:stretch;">
                                                @foreach($pagePosts as $post)
                                                <div style="flex:1;min-width:0;">
                                                    <article class="vlt-post vlt-post--masonry" style="height:100%;display:flex;flex-direction:column;">
                                                        <div class="vlt-post-border">
                                                            <span class="top"></span>
                                                            <span class="right"></span>
                                                            <span class="bottom"></span>
                                                            <span class="left"></span>
                                                        </div>
                                                        <div class="vlt-post-content" style="padding:1.75rem;flex:1;display:flex;flex-direction:column;opacity:1;">
                                                            <header class="vlt-post-header" style="margin-bottom:1rem;">
                                                                <div style="display:flex;align-items:center;gap:0.4rem;margin-bottom:0.85rem;font-size:0.75rem;color:rgba(255,255,255,0.5);">
                                                                    <time>{{ $post['date'] }}</time>
                                                                    <span style="opacity:0.4;">·</span>
                                                                    <span style="display:inline-flex;align-items:center;gap:3px;">
                                                                        <svg style="width:10px;height:10px" viewBox="0 0 24 24" fill="currentColor"><path d="M13.54 0a11.9 11.9 0 0 0-11.9 11.9c0 6.57 5.33 11.9 11.9 11.9 6.58 0 11.9-5.33 11.9-11.9A11.9 11.9 0 0 0 13.54 0zm4.22 17.7l-1.23.7-4.26-7.38V5.1h1.42v5.35l4.07 7.25z"/></svg>
                                                                        Medium
                                                                    </span>
                                                                </div>
                                                                <h6 class="vlt-post-title" style="font-size:0.95rem;line-height:1.45;margin:0;font-weight:500;">
                                                                    <a href="{{ $post['link'] }}" target="_blank" rel="noopener">{{ Str::limit($post['title'], 65) }}</a>
                                                                </h6>
                                                            </header>
                                                            <div style="font-size:0.8rem;line-height:1.65;color:rgba(255,255,255,0.55);flex:1;">{{ $post['excerpt'] }}</div>
                                                            <footer class="vlt-post-footer" style="margin-top:1.25rem;">
                                                                <a class="vlt-read-more-link" href="{{ $post['link'] }}" target="_blank" rel="noopener" style="font-size:0.82rem;">
                                                                    Read More
                                                                    <svg fill="none" viewBox="0 0 16 8" style="height:8px;margin-left:8px;"><path d="M15.3536 4.35355c.1952-.19526.1952-.51184 0-.7071L12.1716.464466c-.1953-.195262-.5119-.195262-.7071 0-.1953.195262-.1953.511845 0 .707104L14.2929 4l-2.8284 2.82843c-.1953.19526-.1953.51184 0 .7071.1952.19527.5118.19527.7071 0l3.182-3.18198zM0 4.5h15v-1H0v1z" fill="currentColor"/></svg>
                                                                </a>
                                                            </footer>
                                                        </div>
                                                    </article>
                                                </div>
                                                @endforeach
                                                {{-- Fill empty slots if last page has < 3 posts --}}
                                                @for($e = count($pagePosts); $e < 3; $e++)
                                                <div style="flex:1;min-width:0;"></div>
                                                @endfor
                                            </div>
                                            @endforeach

                                            {{-- Controls (only if more than 1 page) --}}
                                            @if($totalBlogPages > 1)
                                            <div style="display:flex;align-items:center;justify-content:center;gap:1.5rem;margin-top:1.75rem;">
                                                <button id="blog-prev"
                                                    style="width:38px;height:38px;border-radius:50%;border:1px solid rgba(255,255,255,0.15);
                                                           background:rgba(255,255,255,0.04);color:#fff;cursor:pointer;
                                                           display:flex;align-items:center;justify-content:center;
                                                           transition:all 0.2s;opacity:0.3;pointer-events:none;">
                                                    <svg width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/></svg>
                                                </button>

                                                <div id="blog-dots" style="display:flex;gap:8px;align-items:center;">
                                                    @for($d = 0; $d < $totalBlogPages; $d++)
                                                    <span class="blog-dot" data-page="{{ $d }}"
                                                          style="display:inline-block;width:{{ $d === 0 ? 18 : 6 }}px;height:6px;
                                                                 border-radius:3px;background:#fff;cursor:pointer;
                                                                 opacity:{{ $d === 0 ? 1 : 0.3 }};transition:all 0.3s;"></span>
                                                    @endfor
                                                </div>

                                                <button id="blog-next"
                                                    style="width:38px;height:38px;border-radius:50%;border:1px solid rgba(255,255,255,0.15);
                                                           background:rgba(255,255,255,0.04);color:#fff;cursor:pointer;
                                                           display:flex;align-items:center;justify-content:center;
                                                           transition:all 0.2s;">
                                                    <svg width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg>
                                                </button>
                                            </div>

                                            <script>
                                            (function() {
                                                var pages   = document.querySelectorAll('.blog-page');
                                                var dots    = document.querySelectorAll('.blog-dot');
                                                var prev    = document.getElementById('blog-prev');
                                                var next    = document.getElementById('blog-next');
                                                var total   = pages.length;
                                                var current = 0;

                                                function go(n) {
                                                    pages[current].style.display = 'none';
                                                    current = n;
                                                    pages[current].style.display = 'flex';

                                                    dots.forEach(function(d, i) {
                                                        d.style.opacity = i === current ? '1' : '0.3';
                                                        d.style.width   = i === current ? '18px' : '6px';
                                                    });

                                                    prev.style.opacity       = current === 0 ? '0.3' : '1';
                                                    prev.style.pointerEvents = current === 0 ? 'none' : 'auto';
                                                    next.style.opacity       = current >= total - 1 ? '0.3' : '1';
                                                    next.style.pointerEvents = current >= total - 1 ? 'none' : 'auto';
                                                }

                                                prev.addEventListener('click', function() { if (current > 0) go(current - 1); });
                                                next.addEventListener('click', function() { if (current < total - 1) go(current + 1); });
                                                dots.forEach(function(d) {
                                                    d.addEventListener('click', function() { go(+this.dataset.page); });
                                                });
                                            })();
                                            </script>
                                            @endif

                                        </div>

                                        @else
                                        <div style="width:100%;text-align:center;padding:3rem 0;">
                                            <a href="https://medium.com/@arnaldotomo" target="_blank" rel="noopener" style="color:#00b8d4;">Read articles on Medium →</a>
                                        </div>
                                        @endif

                                    </div>
                                </section>                            </div>

                        </div>
                        <!-- /.container -->

                    </div>
                    <!-- /.vlt-section__content -->

                </div>
                <!-- /.vlt-section__vertical-align -->

            </div>
            <!-- /.vlt-section -->

            <div class="vlt-section pp-scrollable" data-anchor="Packages" style>

                <div class="vlt-section__vertical-align">
                    <div class="vlt-section__content">
                        <div class="container p-0">

                            {{-- Header --}}
                            <div class="vlt-animate-element" data-animation-name="fadeInUpSm" style="margin-bottom:2.5rem;">
                                <h3 class="elementor-heading-title elementor-size-default" style="margin-bottom:0.6rem;">
                                    {{ __("messages.packages_title") }}
                                </h3>
                                <p style="color:rgba(255,255,255,0.45);font-size:0.85rem;line-height:1.6;max-width:520px;margin:0;">
                                    {{ __("messages.packages_description") }}
                                </p>
                            </div>

                            @if(count($packages) > 0)
                            @php $pkgPages = array_chunk($packages, 3); $totalPkgPages = count($pkgPages); @endphp

                            <div style="position:relative;">

                                @foreach($pkgPages as $pageIdx => $pagePackages)
                                <div class="pkg-page" data-page="{{ $pageIdx }}"
                                     style="{{ $pageIdx === 0 ? 'display:flex;' : 'display:none;' }}gap:20px;align-items:stretch;">

                                    @foreach($pagePackages as $pkg)
                                    @php
                                        $pkgShortName = explode('/', $pkg['name'])[1] ?? $pkg['name'];
                                        $pkgVendor    = explode('/', $pkg['name'])[0] ?? '';
                                        $packagistUrl = 'https://packagist.org/packages/' . $pkg['name'];
                                        $composerCmd  = 'composer require ' . $pkg['name'];
                                        $pkgDownloads = $pkg['downloads'] ?? null;
                                        $pkgStars     = $pkg['stars'] ?? null;
                                        $copyId       = 'copy-' . Str::slug($pkg['name']);
                                    @endphp
                                    <div style="flex:1;min-width:0;">
                                        <div class="vlt-post vlt-post--masonry" style="height:100%;display:flex;flex-direction:column;">
                                            <div class="vlt-post-border">
                                                <span class="top"></span><span class="right"></span>
                                                <span class="bottom"></span><span class="left"></span>
                                            </div>
                                            <div class="vlt-post-content" style="padding:1.5rem;flex:1;display:flex;flex-direction:column;opacity:1;">

                                                {{-- Vendor --}}
                                                <div style="font-size:0.65rem;color:rgba(255,255,255,0.3);letter-spacing:0.08em;
                                                            text-transform:uppercase;margin-bottom:0.35rem;">{{ $pkgVendor }}</div>

                                                {{-- Package name --}}
                                                <div style="font-size:0.98rem;font-weight:600;color:#fff;
                                                            line-height:1.3;margin-bottom:0.5rem;">{{ $pkgShortName }}</div>

                                                {{-- #5 Tech stack badges --}}
                                                <div style="display:flex;gap:5px;margin-bottom:0.75rem;">
                                                    <span class="pkg-stack-badge laravel">
                                                        <svg style="width:9px;height:9px;" viewBox="0 0 50 52" fill="currentColor"><path d="M49.626 11.564a.809.809 0 0 1 .028.209v10.972a.8.8 0 0 1-.402.694l-9.209 5.302V39.25c0 .286-.152.55-.4.694L20.42 51.01c-.044.025-.092.041-.14.058-.018.006-.035.017-.054.022a.812.812 0 0 1-.41 0c-.022-.006-.042-.018-.063-.026-.044-.016-.09-.031-.132-.054L.402 39.944A.801.801 0 0 1 0 39.25V6.334c0-.072.01-.142.028-.209.006-.023.02-.044.028-.067.015-.042.029-.085.051-.124.015-.026.037-.047.055-.071.023-.032.044-.065.071-.093.023-.023.053-.04.079-.06.029-.022.055-.047.088-.065h.001l9.61-5.533a.802.802 0 0 1 .8 0l9.61 5.533h.002c.032.018.059.043.088.065.026.02.055.037.078.06.028.028.048.061.072.093.017.024.04.045.054.071.023.04.036.082.052.124.008.023.022.044.028.067zm-1.574 10.729V13.12l-3.869 2.231-5.342 3.071v9.172zM38.652 24.611l5.34-3.076 3.868-2.221-9.208-5.301-9.21 5.302 9.21 5.296zM28.25 43.888v-9.16l-5.275 3.035-15.069 8.638 20.344 11.714zM1.602 7.719v31.53l20.343 11.716V19.435L1.602 7.719zm8.008-5.994L9.61 1.726.4 6.333l9.21 5.302 9.208-5.302-9.208-4.608zm4.344 29.812l5.342-3.071V19.29l-9.21-5.302v9.17zm15.054-8.677l-9.208-5.302-9.21 5.302 9.21 5.3zm-9.61 16.333l5.276-3.035 3.934-2.27-9.21-5.3-9.208 5.3 9.208 5.305z"/></svg>
                                                        Laravel
                                                    </span>
                                                    <span class="pkg-stack-badge php">
                                                        <svg style="width:9px;height:9px;" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm-1.25 16.518l-4.5.001.875-4.483h1.862c.891 0 1.375-.285 1.455-.854.031-.221-.019-.363-.15-.426-.132-.065-.471-.096-1.021-.092l-1.922.001.845-4.33h6.077l-.378 1.894H12.24a4.6 4.6 0 00-.609.027c-.311.044-.544.14-.697.29-.153.149-.236.32-.248.513-.016.232.066.399.244.502.179.102.493.153.944.153h.672c.924 0 1.578.147 1.961.441.383.294.529.78.438 1.456-.092.676-.386 1.248-.882 1.716-.497.468-1.121.76-1.872.876-.406.064-.882.096-1.431.096H10.42l-.244 1.219.571.001zm7.012 0h-1.74l.245-1.22h-.571c-.549 0-1.025-.032-1.431-.096-.751-.116-1.375-.408-1.872-.876-.496-.468-.79-1.04-.882-1.716-.091-.676.055-1.162.438-1.456.383-.294 1.037-.441 1.961-.441h.672c.451 0 .765-.051.944-.153.178-.103.26-.27.244-.502-.012-.193-.095-.364-.248-.513-.153-.15-.386-.246-.697-.29a4.6 4.6 0 00-.609-.027h-1.653l.378-1.894H18.7l-.845 4.33-1.922-.001c-.55-.004-.889.027-1.021.092-.131.063-.181.205-.15.426.08.569.564.854 1.455.854h1.862l-.875 4.483h-1.443z"/></svg>
                                                        PHP
                                                    </span>
                                                </div>

                                                {{-- Stats row --}}
                                                @if($pkgDownloads !== null || $pkgStars !== null)
                                                <div style="display:flex;gap:1rem;margin-bottom:0.9rem;">
                                                    @if($pkgDownloads !== null)
                                                    <span style="display:inline-flex;align-items:center;gap:4px;font-size:0.68rem;color:rgba(255,255,255,0.4);">
                                                        <svg style="width:10px;height:10px" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v7.586l2.293-2.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 10.586V3a1 1 0 011-1zm-7 14a1 1 0 100 2h14a1 1 0 100-2H3z"/></svg>
                                                        {{ number_format($pkgDownloads) }}
                                                    </span>
                                                    @endif
                                                    @if($pkgStars)
                                                    <span style="display:inline-flex;align-items:center;gap:4px;font-size:0.68rem;color:rgba(255,255,255,0.4);">
                                                        <svg style="width:10px;height:10px" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                                        {{ number_format($pkgStars) }}
                                                    </span>
                                                    @endif
                                                </div>
                                                @endif

                                                {{-- Description --}}
                                                <p style="font-size:0.78rem;line-height:1.65;color:rgba(255,255,255,0.5);
                                                          flex:1;margin:0 0 1.1rem;">{{ Str::limit($pkg['description'] ?? '', 120) }}</p>

                                                {{-- Composer command + copy --}}
                                                <div style="background:rgba(0,0,0,0.4);border:1px solid rgba(255,255,255,0.07);border-radius:6px;
                                                            padding:0.55rem 0.75rem;margin-bottom:1rem;
                                                            display:flex;align-items:center;gap:0.5rem;">
                                                    <svg style="width:10px;height:10px;flex-shrink:0;color:rgba(255,255,255,0.25)" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm3.293 1.293a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L7.586 10 5.293 7.707a1 1 0 010-1.414zM11 12a1 1 0 100 2h3a1 1 0 100-2h-3z"/>
                                                    </svg>
                                                    <code id="{{ $copyId }}"
                                                          style="font-size:0.65rem;color:#86efac;font-family:'JetBrains Mono',monospace;
                                                                 white-space:nowrap;overflow:hidden;text-overflow:ellipsis;flex:1;">{{ $composerCmd }}</code>
                                                    <button onclick="copyCmd('{{ $copyId }}', this)"
                                                            title="Copy"
                                                            style="flex-shrink:0;background:none;border:none;color:rgba(255,255,255,0.35);
                                                                   cursor:pointer;padding:0;line-height:1;transition:color 0.2s;"
                                                            onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,0.35)'">
                                                        <svg style="width:13px;height:13px;" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M8 2a2 2 0 00-2 2v1H5a2 2 0 00-2 2v9a2 2 0 002 2h8a2 2 0 002-2v-1h1a2 2 0 002-2V5a2 2 0 00-2-2H9a2 2 0 00-2 2v1H6V4a1 1 0 011-1h6a1 1 0 011 1v1h1V4a2 2 0 00-2-2H8zm1 4h4a1 1 0 011 1v8a1 1 0 01-1 1H5a1 1 0 01-1-1V7a1 1 0 011-1h1v1a1 1 0 001 1h2a1 1 0 001-1V6z"/>
                                                        </svg>
                                                    </button>
                                                </div>

                                                {{-- Buttons --}}
                                                <div style="display:flex;gap:0.5rem;">
                                                    <a href="{{ $packagistUrl }}" target="_blank" rel="noopener"
                                                       style="flex:1;display:inline-flex;align-items:center;justify-content:center;gap:5px;
                                                              padding:0.45rem 0.6rem;border-radius:6px;font-size:0.7rem;font-weight:500;
                                                              border:1px solid rgba(255,255,255,0.1);background:rgba(255,255,255,0.04);
                                                              color:#d1d5db;text-decoration:none;transition:border-color 0.2s,background 0.2s;"
                                                       onmouseover="this.style.borderColor='rgba(255,255,255,0.25)';this.style.background='rgba(255,255,255,0.08)'"
                                                       onmouseout="this.style.borderColor='rgba(255,255,255,0.1)';this.style.background='rgba(255,255,255,0.04)'">
                                                        {{-- Packagist official logo --}}
                                                        <svg style="width:13px;height:13px;flex-shrink:0;" viewBox="0 0 512 512" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M255.99 60.12L32 183.68v144.64l224 123.56 224-123.56V183.68L255.99 60.12zM64 204.93L256 100.43l192 104.5v.5L256 309.93 64 205.43v-.5zm0 123.28l176 97.02v-97.5L64 231.5v96.71zm224 97.02l176-97.02V231.5L288 327.73v97.5z"/>
                                                        </svg>
                                                        Packagist
                                                    </a>
                                                    @if(!empty($pkg['repository']))
                                                    <a href="{{ $pkg['repository'] }}" target="_blank" rel="noopener"
                                                       style="flex:1;display:inline-flex;align-items:center;justify-content:center;gap:5px;
                                                              padding:0.45rem 0.6rem;border-radius:6px;font-size:0.7rem;font-weight:500;
                                                              border:1px solid rgba(255,255,255,0.1);background:rgba(255,255,255,0.04);
                                                              color:#d1d5db;text-decoration:none;transition:border-color 0.2s,background 0.2s;"
                                                       onmouseover="this.style.borderColor='rgba(255,255,255,0.25)';this.style.background='rgba(255,255,255,0.08)'"
                                                       onmouseout="this.style.borderColor='rgba(255,255,255,0.1)';this.style.background='rgba(255,255,255,0.04)'">
                                                        {{-- GitHub SVG --}}
                                                        <svg style="width:12px;height:12px;flex-shrink:0;" viewBox="0 0 24 24" fill="currentColor">
                                                            <path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0 1 12 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/>
                                                        </svg>
                                                        GitHub
                                                    </a>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    @for($e = count($pagePackages); $e < 3; $e++)
                                    <div style="flex:1;min-width:0;"></div>
                                    @endfor
                                </div>
                                @endforeach

                                @if($totalPkgPages > 1)
                                <div style="display:flex;align-items:center;justify-content:center;gap:1.5rem;margin-top:1.75rem;">
                                    <button id="pkg-prev"
                                        style="width:38px;height:38px;border-radius:50%;border:1px solid rgba(255,255,255,0.15);
                                               background:rgba(255,255,255,0.04);color:#fff;cursor:pointer;
                                               display:flex;align-items:center;justify-content:center;transition:all 0.2s;
                                               opacity:0.3;pointer-events:none;">
                                        <svg width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/></svg>
                                    </button>
                                    <div style="display:flex;gap:8px;align-items:center;">
                                        @for($d = 0; $d < $totalPkgPages; $d++)
                                        <span class="pkg-dot" data-page="{{ $d }}"
                                              style="display:inline-block;width:{{ $d===0?18:6 }}px;height:6px;border-radius:3px;
                                                     background:#fff;cursor:pointer;opacity:{{ $d===0?1:0.3 }};transition:all 0.3s;"></span>
                                        @endfor
                                    </div>
                                    <button id="pkg-next"
                                        style="width:38px;height:38px;border-radius:50%;border:1px solid rgba(255,255,255,0.15);
                                               background:rgba(255,255,255,0.04);color:#fff;cursor:pointer;
                                               display:flex;align-items:center;justify-content:center;transition:all 0.2s;">
                                        <svg width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg>
                                    </button>
                                </div>
                                <script>
                                (function(){
                                    var pages=document.querySelectorAll('.pkg-page'),
                                        dots=document.querySelectorAll('.pkg-dot'),
                                        prev=document.getElementById('pkg-prev'),
                                        next=document.getElementById('pkg-next'),
                                        total=pages.length, cur=0;
                                    function go(n){
                                        pages[cur].style.display='none'; cur=n; pages[cur].style.display='flex';
                                        dots.forEach(function(d,i){ d.style.opacity=i===cur?'1':'0.3'; d.style.width=i===cur?'18px':'6px'; });
                                        prev.style.opacity=cur===0?'0.3':'1'; prev.style.pointerEvents=cur===0?'none':'auto';
                                        next.style.opacity=cur>=total-1?'0.3':'1'; next.style.pointerEvents=cur>=total-1?'none':'auto';
                                    }
                                    prev.addEventListener('click',function(){ if(cur>0) go(cur-1); });
                                    next.addEventListener('click',function(){ if(cur<total-1) go(cur+1); });
                                    dots.forEach(function(d){ d.addEventListener('click',function(){ go(+this.dataset.page); }); });
                                })();
                                </script>
                                @endif

                            </div>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
            <!-- /.vlt-section (Packages) -->

            <div class="vlt-section pp-scrollable" data-anchor="Contact" style>

                <div class="vlt-section__vertical-align">

                    <div class="vlt-section__content">

                        <div class="vlt-section__ken-burn-background">

                            <img src="/contatc.svg" alt="background" loading="lazy">

                        </div>
                        <!-- /.vlt-section__ken-burn-background -->

                        <div class="container p-0">

                            <div data-elementor-type="wp-post" data-elementor-id="14" class="elementor elementor-14">
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-7040837 elementor-section-boxed elementor-section-height-default"
                                    data-id="7040837" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-f531030"
                                            data-id="f531030" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="vlt-animate-element elementor-element elementor-element-37183cd elementor-widget elementor-widget-heading"
                                                    data-animation-name="fadeInUpSm" style data-id="37183cd"
                                                    data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"fadeinupsm"}"=""
                                                    data-widget_type="heading.default">
                                                    <div class="elementor-widget-container">
                                                        <h3 class="elementor-heading-title elementor-size-default">
                                                            {{ __('menu.contact') }}
                                                            </h3>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-8f5411f elementor-widget elementor-widget-spacer"
                                                    data-id="8f5411f" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"none"}"=""
                                                    data-widget_type="spacer.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-spacer">
                                                            <div class="elementor-spacer-inner"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="vlt-animate-element elementor-element elementor-element-2113bd3 elementor-widget elementor-widget-text-editor"
                                                    data-animation-name="fadeInUpSm" style=" --animate-delay: 100ms;"
                                                    data-id="2113bd3" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"fadeinupsm"}"=""
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="avail-badge">
                                                            <span class="avail-dot"></span>
                                                            Disponível para novos projetos
                                                        </div>
                                                        {!! __('messages.availability') !!}
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-384fa45 elementor-widget elementor-widget-spacer"
                                                    data-id="384fa45" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"none"}"=""
                                                    data-widget_type="spacer.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-spacer">
                                                            <div class="elementor-spacer-inner"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="vlt-animate-element elementor-element elementor-element-49f9886 elementor-widget elementor-widget-html"
                                                    data-animation-name="fadeInUpSm" style=" --animate-delay: 300ms;"
                                                    data-id="49f9886" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"fadeinupsm"}"=""
                                                    data-widget_type="html.default">
                                                    <div class="elementor-widget-container">
                                                        <address>Maputo, Moçambique</address>
                                                    </div>
                                                </div>
                                                <div class="vlt-animate-element elementor-element elementor-element-f53ef89 elementor-widget elementor-widget-text-editor"
                                                    data-animation-name="fadeInUpSm" style=" --animate-delay: 400ms;"
                                                    data-id="f53ef89" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"fadeinupsm"}"=""
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        <a href="tel:+258846474687" class="copy-contact" data-copy="+258 84 647 4687" onclick="copyContact(this,event)">+258 84 647 4687</a>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-b615013 elementor-widget elementor-widget-spacer"
                                                    data-id="b615013" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"none"}"=""
                                                    data-widget_type="spacer.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-spacer">
                                                            <div class="elementor-spacer-inner"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="vlt-animate-element elementor-element elementor-element-03f231b elementor-widget elementor-widget-text-editor"
                                                    data-animation-name="fadeInUpSm" style=" --animate-delay: 500ms;"
                                                    data-id="03f231b" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"fadeinupsm"}"=""
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        <a href="mailto:contacto@arnaldotomo.dev" class="copy-contact" data-copy="contacto@arnaldotomo.dev" onclick="copyContact(this,event)">contacto@arnaldotomo.dev</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-0115a12"
                                            data-id="0115a12" data-element_type="column">
                                            <div class="elementor-widget-wrap">
                                            </div>
                                        </div>
                                        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-9ebccc3"
                                            data-id="9ebccc3" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="vlt-animate-element elementor-element elementor-element-a08e302 elementor-widget elementor-widget-heading"
                                                    data-animation-name="fadeInUpSm" style=" --animate-delay: 600ms;"
                                                    data-id="a08e302" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"fadeinupsm"}"=""
                                                    data-widget_type="heading.default">
                                                    <div class="elementor-widget-container">
                                                        <h4 class="elementor-heading-title elementor-size-default">Vamos
                                                            conversar sobre seu próximo projeto? <span
                                                                class="has-accent-color">Fale comigo.</span></h4>
                                                    </div>
                                                </div>
                                                <div class="vlt-animate-element elementor-element elementor-element-3326f20 elementor-widget elementor-widget-spacer"
                                                    data-animation-name="fadeInUpSm" style=" --animate-delay: 700ms;"
                                                    data-id="3326f20" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"fadeinupsm"}"=""
                                                    data-widget_type="spacer.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-spacer">
                                                            <div class="elementor-spacer-inner"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="vlt-animate-element elementor-element elementor-element-061dfff elementor-widget elementor-widget-vlt-contact-form-7"
                                                    data-animation-name="fadeInUpSm" style=" --animate-delay: 700ms;"
                                                    data-id="061dfff" data-element_type="widget" data-settings="{"
                                                    vlt_animated_widget_animation":"fadeinupsm"}"=""
                                                    data-widget_type="vlt-contact-form-7.default">
                                                    <div class="elementor-widget-container">

                                                        <div class="vlt-contact-form-7">
                                                            <form id="portfolio-contact-form" novalidate>
                                                                @csrf
                                                                <div class="vlt-form-group">
                                                                    <input type="text" name="name" id="cf-name"
                                                                        class="wpcf7-form-control wpcf7-text"
                                                                        placeholder="Seu Nome" required maxlength="120">
                                                                </div>
                                                                <div class="vlt-form-group">
                                                                    <input type="email" name="email" id="cf-email"
                                                                        class="wpcf7-form-control wpcf7-email"
                                                                        placeholder="Seu Email" required maxlength="200">
                                                                </div>
                                                                <div class="vlt-form-group">
                                                                    <textarea name="message" id="cf-message" rows="4"
                                                                        class="wpcf7-form-control wpcf7-textarea"
                                                                        placeholder="Mensagem" required maxlength="3000"></textarea>
                                                                </div>
                                                                <button type="submit" id="cf-submit"
                                                                    class="wpcf7-form-control wpcf7-submit vlt-btn vlt-btn--primary">
                                                                    <span id="cf-btn-text">Enviar Mensagem</span>
                                                                </button>
                                                                <div id="cf-response" style="margin-top:14px;font-size:13px;display:none;padding:12px 16px;border-radius:6px;"></div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                        </div>
                        <!-- /.container -->

                    </div>
                    <!-- /.vlt-section__content -->

                </div>
                <!-- /.vlt-section__vertical-align -->

            </div>
            <!-- /.vlt-section -->

            <div class="vlt-fullpage-slider-progress-bar"><span></span></div>
        </div>

    </main>
    <!-- /.vlt-main -->

    <footer class="vlt-footer vlt-footer--default vlt-footer--fixed">

        <div class="vlt-footer-copyright">

            <p>© Arnaldo Tomo.</p>
        </div>
        <!-- /.vlt-footer-copyright -->

    </footer>
    <!-- /.vlt-footer -->

    <script type="text/javascript">
        const lazyloadRunObserver = () => {
            const lazyloadBackgrounds = document.querySelectorAll(`.e-con.e-parent:not(.e-lazyloaded)`);
            const lazyloadBackgroundObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        let lazyloadBackground = entry.target;
                        if (lazyloadBackground) {
                            lazyloadBackground.classList.add('e-lazyloaded');
                        }
                        lazyloadBackgroundObserver.unobserve(entry.target);
                    }
                });
            }, {
                rootMargin: '200px 0px 200px 0px'
            });
            lazyloadBackgrounds.forEach((lazyloadBackground) => {
                lazyloadBackgroundObserver.observe(lazyloadBackground);
            });
        };
        const events = [
            'DOMContentLoaded'
            , 'elementor/lazyload/observe'
        , ];
        events.forEach((event) => {
            document.addEventListener(event, lazyloadRunObserver);
        });

    </script>
    <link rel="stylesheet" id="elementor-post-28-css" href="css/post-28.css" type="text/css" media="all">
    <link rel="stylesheet" id="widget-spacer-css" href="css/widget-spacer.min.css" type="text/css" media="all">
    <link rel="stylesheet" id="widget-heading-css" href="css/widget-heading.min.css" type="text/css" media="all">
    <link rel="stylesheet" id="widget-text-editor-css" href="css/widget-text-editor.min.css" type="text/css"
        media="all">
    <link rel="stylesheet" id="elementor-post-26-css" href="css/post-26.css" type="text/css" media="all">
    <link rel="stylesheet" id="elementor-post-24-css" href="css/post-24.css" type="text/css" media="all">
    <link rel="stylesheet" id="elementor-post-22-css" href="css/post-22.css" type="text/css" media="all">
    <link rel="stylesheet" id="elementor-post-20-css" href="css/post-20.css" type="text/css" media="all">
    <link rel="stylesheet" id="elementor-post-18-css" href="css/post-18.css" type="text/css" media="all">
    <link rel="stylesheet" id="elementor-post-16-css" href="css/post-16.css" type="text/css" media="all">
    <link rel="stylesheet" id="elementor-post-14-css" href="css/post-14.css" type="text/css" media="all">
    <script type="text/javascript" src="js/hooks.min.js" id="wp-hooks-js"></script>
    <script type="text/javascript" src="js/i18n.min.js" id="wp-i18n-js"></script>
    <script type="text/javascript" id="wp-i18n-js-after"></script>
    <script type="text/javascript" src="js/index.js" id="contact-form-7-js"></script>
    <script type="text/javascript" src="js/imagesloaded.min.js" id="imagesloaded-js"></script>
    <script type="text/javascript" src="js/masonry.min.js" id="masonry-js"></script>
    <script type="text/javascript" src="js/jquery.masonry.min.js" id="jquery-masonry-js"></script>
    <script type="text/javascript" src="js/animsition.min.js" id="animsition-js"></script>
    <script type="text/javascript" src="js/css-vars-ponyfill.min.js" id="css-vars-ponyfill-js"></script>
    <script type="text/javascript" src="js/fastclick.js" id="fastclick-js"></script>
    <script type="text/javascript" src="js/gsap.min.js" id="gsap-js"></script>
    <script type="text/javascript" src="js/jarallax.min.js" id="jarallax-js"></script>
    <script type="text/javascript" src="js/jquery-numerator.js" id="numerator-js"></script>
    <script type="text/javascript" src="js/jquery.fancybox.min.js" id="fancybox-js"></script>
    <script type="text/javascript" src="js/jquery.inview.min.js" id="inview-js"></script>
    <script type="text/javascript" src="js/jquery.pagepiling.min.js" id="pagepiling-js"></script>
    <script type="text/javascript" src="js/superclick.min.js" id="superclick-js"></script>
    <script type="text/javascript" src="js/superfish.js" id="superfish-js"></script>
    <script type="text/javascript" src="js/swiper.min.js" id="swiper-js"></script>
    <script type="text/javascript" src="js/jquery.fitvids.js" id="fitvids-js"></script>
    <script type="text/javascript" src="js/vlt-helpers.js" id="vlt-helpers-js"></script>
    <script type="text/javascript" src="js/vlt-controllers.min.js" id="vlt-controllers-js"></script>
    <script type="text/javascript" id="gt_widget_script_80322897-js-before">

    </script>
    <script src="js/float.js" data-no-optimize="1" data-no-minify="1" data-gt-orig-url="/wordpress/gilber/"
        data-gt-orig-domain="gasinforest.com" data-gt-widget-id="80322897" defer></script>
    <script type="text/javascript" src="js/webpack.runtime.min.js" id="elementor-webpack-runtime-js"></script>
    <script type="text/javascript" src="js/frontend-modules.min.js" id="elementor-frontend-modules-js"></script>
    <script type="text/javascript" src="js/core.min.js" id="jquery-ui-core-js"></script>
    <script type="text/javascript" id="elementor-frontend-js-before">
        /* <![CDATA[ */
        var elementorFrontendConfig = {
            "environmentMode": {
                "edit": false
                , "wpPreview": false
                , "isScriptDebug": false
            }
            , "i18n": {
                "shareOnFacebook": "Share on Facebook"
                , "shareOnTwitter": "Share on Twitter"
                , "pinIt": "Pin it"
                , "download": "Download"
                , "downloadImage": "Download image"
                , "fullscreen": "Fullscreen"
                , "zoom": "Zoom"
                , "share": "Share"
                , "playVideo": "Play Video"
                , "previous": "Previous"
                , "next": "Next"
                , "close": "Close"
                , "a11yCarouselPrevSlideMessage": "Previous slide"
                , "a11yCarouselNextSlideMessage": "Next slide"
                , "a11yCarouselFirstSlideMessage": "This is the first slide"
                , "a11yCarouselLastSlideMessage": "This is the last slide"
                , "a11yCarouselPaginationBulletMessage": "Go to slide"
            }
            , "is_rtl": false
            , "breakpoints": {
                "xs": 0
                , "sm": 480
                , "md": 768
                , "lg": 1025
                , "xl": 1440
                , "xxl": 1600
            }
            , "responsive": {
                "breakpoints": {
                    "mobile": {
                        "label": "Mobile Portrait"
                        , "value": 767
                        , "default_value": 767
                        , "direction": "max"
                        , "is_enabled": true
                    }
                    , "mobile_extra": {
                        "label": "Mobile Landscape"
                        , "value": 880
                        , "default_value": 880
                        , "direction": "max"
                        , "is_enabled": false
                    }
                    , "tablet": {
                        "label": "Tablet Portrait"
                        , "value": 1024
                        , "default_value": 1024
                        , "direction": "max"
                        , "is_enabled": true
                    }
                    , "tablet_extra": {
                        "label": "Tablet Landscape"
                        , "value": 1200
                        , "default_value": 1200
                        , "direction": "max"
                        , "is_enabled": false
                    }
                    , "laptop": {
                        "label": "Laptop"
                        , "value": 1366
                        , "default_value": 1366
                        , "direction": "max"
                        , "is_enabled": false
                    }
                    , "widescreen": {
                        "label": "Widescreen"
                        , "value": 2400
                        , "default_value": 2400
                        , "direction": "min"
                        , "is_enabled": false
                    }
                }
                , "hasCustomBreakpoints": false
            }
            , "version": "3.26.3"
            , "is_static": false
            , "experimentalFeatures": {
                "e_swiper_latest": true
                , "e_nested_atomic_repeaters": true
                , "e_onboarding": true
                , "e_css_smooth_scroll": true
                , "home_screen": true
                , "link-in-bio": true
                , "floating-buttons": true
                , "launchpad-checklist": true
            }
            , "urls": {
                "assets": "https:\/\/gasinforest.com\/wordpress\/gilber\/wp-content\/plugins\/elementor\/assets\/"
                , "ajaxurl": "https:\/\/gasinforest.com\/wordpress\/gilber\/wp-admin\/admin-ajax.php"
                , "uploadUrl": "https:\/\/gasinforest.com\/wordpress\/gilber\/wp-content\/uploads"
            }
            , "nonces": {
                "floatingButtonsClickTracking": "f2dba40a39"
            }
            , "swiperClass": "swiper"
            , "settings": {
                "page": []
                , "editorPreferences": []
            }
            , "kit": {
                "active_breakpoints": ["viewport_mobile", "viewport_tablet"]
                , "lightbox_enable_counter": "yes"
                , "lightbox_enable_fullscreen": "yes"
                , "lightbox_enable_zoom": "yes"
                , "lightbox_enable_share": "yes"
                , "lightbox_title_src": "title"
                , "lightbox_description_src": "description"
            }

        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="js/frontend.min.js" id="elementor-frontend-js"></script>

    <script>
        document.querySelectorAll('.tab-button').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.tab-button').forEach(function(b) { b.classList.remove('active'); });
                btn.classList.add('active');
                document.querySelectorAll('.tab-content').forEach(function(c) { c.classList.remove('active'); });
                document.getElementById(btn.dataset.tab + '-tab').classList.add('active');
            });
        });
    </script>

    <script>
    function copyCmd(id, btn) {
        var text = document.getElementById(id).textContent.trim();
        navigator.clipboard.writeText(text).then(function() {
            var orig = btn.innerHTML;
            btn.innerHTML = '<svg style="width:13px;height:13px" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>';
            btn.style.color = '#86efac';
            setTimeout(function() { btn.innerHTML = orig; btn.style.color = 'rgba(255,255,255,0.35)'; }, 1500);
        });
    }
    </script>

    {{-- Contact form AJAX --}}
    <script>
    (function () {
        var form   = document.getElementById('portfolio-contact-form');
        var btn    = document.getElementById('cf-submit');
        var btnTxt = document.getElementById('cf-btn-text');
        var resp   = document.getElementById('cf-response');
        if (!form) return;

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();

            var name    = document.getElementById('cf-name').value.trim();
            var email   = document.getElementById('cf-email').value.trim();
            var message = document.getElementById('cf-message').value.trim();

            if (!name || !email || !message) {
                showResp('Por favor preencha todos os campos.', false);
                return;
            }

            btn.disabled = true;
            btnTxt.textContent = 'A enviar…';

            var formData = new FormData();
            formData.append('name', name);
            formData.append('email', email);
            formData.append('message', message);
            formData.append('_token', document.querySelector('input[name="_token"]') ?
                document.querySelector('input[name="_token"]').value :
                '{{ csrf_token() }}');

            fetch('{{ route("contact.send") }}', {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
                body: formData,
            })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                if (data.success) {
                    form.reset();
                    showResp('✓ Mensagem enviada! Verifique o seu email — enviámos uma confirmação.', true);
                } else {
                    var msg = data.errors ? Object.values(data.errors).flat().join(' ') : 'Ocorreu um erro. Tente novamente.';
                    showResp(msg, false);
                }
            })
            .catch(function () {
                showResp('Falha na ligação. Verifique a internet e tente novamente.', false);
            })
            .finally(function () {
                btn.disabled = false;
                btnTxt.textContent = 'Enviar Mensagem';
            });
        });

        function showResp(msg, ok) {
            resp.textContent = msg;
            resp.style.display = 'block';
            resp.style.background = ok ? 'rgba(74,222,128,0.08)' : 'rgba(239,68,68,0.08)';
            resp.style.border     = ok ? '1px solid rgba(74,222,128,0.25)' : '1px solid rgba(239,68,68,0.25)';
            resp.style.color      = ok ? '#4ade80' : '#f87171';
        }
    })();
    </script>

    {{-- #9 Copy contact function --}}
    <script>
    function copyContact(el, e) {
        e.preventDefault();
        var text = el.getAttribute('data-copy');
        if (!navigator.clipboard) {
            // fallback
            var ta = document.createElement('textarea');
            ta.value = text;
            document.body.appendChild(ta);
            ta.select();
            document.execCommand('copy');
            document.body.removeChild(ta);
            showCopyTooltip(el);
            return;
        }
        navigator.clipboard.writeText(text).then(function() {
            showCopyTooltip(el);
        });
    }
    function showCopyTooltip(el) {
        var old = el.querySelector('.copy-tooltip');
        if (old) old.remove();
        var tip = document.createElement('span');
        tip.className = 'copy-tooltip';
        tip.textContent = 'Copiado!';
        el.appendChild(tip);
        setTimeout(function() { tip.remove(); }, 1800);
    }
    </script>

    {{-- #10 Blog skeleton reveal --}}
    <script>
    (function() {
        var sk = document.getElementById('blog-skeleton-wrap');
        var real = document.getElementById('blog-real-content');
        if (sk && real) {
            setTimeout(function() {
                sk.style.display = 'none';
                real.style.display = 'block';
            }, 750);
        }
    })();
    </script>

    {{-- Hackher: Sua Pegada Digital — carregado após todos os outros scripts --}}
    <script src="{{ asset('js/hackher-detect.js') }}"></script>

</body>

</html>
