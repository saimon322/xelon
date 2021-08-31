<?php
/**
 * Template Name: Pricing page calc
 */

get_header(); ?>

<div class="xln-page">
    <section class="pricing-banner">
        <div class="xln-container">
            <div class="xln-content">
                <h1>Scalable, transparent, Swiss made</h1>
                <div class="pricing-banner__icons">
                    <img src="<?php echo TEMPLATE_URL; ?>/xln-layout/dist/img/icon/pricing-scale.svg" alt="">
                    <img src="<?php echo TEMPLATE_URL; ?>/xln-layout/dist/img/icon/pricing-eye.svg" alt="">
                    <img src="<?php echo TEMPLATE_URL; ?>/xln-layout/dist/img/icon/pricing-swiss.svg" alt="">
                </div>
                <p>Erstellen Sie eine Cloud-Server- und Container-Infrastruktur<br> per Mausklick, und Sie werden nur so viel zahlen, wie Sie verbrauchen</p>
            </div>
            <div class="pricing-banner-form">
                <p class="pricing-banner-form__title">
                    Kostenlose Guthaben für 60 Tage erhalten!
                </p>
                <form action="#" class="pricing-banner-form__form">
                    <div class="form-block">
                        <input type="email" name="email" id="email" placeholder="Email*" class="form-input">
                        <label for="email" class="form-label">Email*</label>
                        <div class="msg"></div>
                    </div>
                    <input type="submit" class="xln-button xln-button--green" value="Jetzt anmelden">
                </form>
                <div class="pricing-banner-form__footer">
                    <div class="signups-title">
                        <span>oder registrieren Sie sich mit</span>
                    </div>
                    <div class="signups">
                        <a href="#" class="signup">
                            <img src="<?php echo TEMPLATE_URL; ?>/xln-layout/dist/img/icon/google.svg" alt="">
                            <span>Google</span>
                        </a>
                        <a href="#" class="signup">
                            <img src="<?php echo TEMPLATE_URL; ?>/xln-layout/dist/img/icon/github.svg" alt="">
                            <span>GitHub</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.pricing-banner -->

    <section class="pricing-about">
        <div class="xln-container">
            <div class="xln-content">
                <h2>Der richtige Plan für Ihr Unternehmen</h2>
                <p>Wir helfen Ihnen, Ihre Server- und Webanwendungen bereitzustellen. Überlassen Sie uns Themen wie Hardering, Patching, Monitoring und Backup und fokusieren Sie sich auf Ihre Kernkompetenzen</p>
            </div>
            <div class="pricing-about__content">
                <div class="xln-about-items">
                    <div class="xln-about-item">
                        <div class="xln-about-item__icon">
                            <img src="<?php echo TEMPLATE_URL; ?>/xln-layout/dist/img/icon/about-rocket.svg" alt="">
                        </div>
                        <h3 class="xln-about-item__title">
                            Start small
                        </h3>
                        <p class="xln-about-item__text">
                            Egal, ob es sich um eine umfangreiche Infrastruktur oder eine kleine Testumgebung handelt. Mit Xelon HQ richten Sie die Infrastruktur für Ihre Bedürfnisse ein
                        </p>
                    </div>
                    <div class="xln-about-item">
                        <div class="xln-about-item__icon">
                            <img src="<?php echo TEMPLATE_URL; ?>/xln-layout/dist/img/icon/about-atom.svg" alt="">
                        </div>
                        <h3 class="xln-about-item__title">
                            Think big
                        </h3>
                        <p class="xln-about-item__text">
                            Schweizer Datensicherung, ISO-zertifiziertes Rechenzentrum, Enterprise-Support und ein exzellentes Expertenteam helfen Ihnen zum Erfolg
                        </p>
                    </div>
                    <div class="xln-about-item">
                        <div class="xln-about-item__icon">
                            <img src="<?php echo TEMPLATE_URL; ?>/xln-layout/dist/img/icon/about-chart.svg" alt="">
                        </div>
                        <h3 class="xln-about-item__title">
                            Scale fast
                        </h3>
                        <p class="xln-about-item__text">
                            Ihr Unternehmen wächst und Sie müssen Ihre Infrastruktur erwietern? Wir haben für Sie vorgesorgt! Skalieren Sie Ihre Infrastruktur per Mausklick
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.pricing-about -->

    <section class="pricing-calc">
        <div class="xln-content">
            <div class="xln-container">
                <h2 class="xln-content__title">
                    <img src="<?php echo TEMPLATE_URL; ?>/xln-layout/dist/img/icon/pricing-calc.svg" alt="">
                    Preisrechner
                </h2>
                <p>Erstellen Sie Ihre eigene Infrastruktur und nutzen Sie den Kalkulator, um einen besseren Überblick über Ihre Kosten zu erhalten. Fügen Sie einfach Elemente hinzu, die Sie verwenden möchten, und erhalten Sie die Kostenschätzung</p>
            </div>
        </div>
            
        <div class="calc">
            <div class="calc__container xln-container">
                <div class="calc-section calc-servers">
                    <div class="calc-section__header calc-block">
                        <div class="calc-row">
                            <div class="calc-section__title">
                                Infrastruktur
                                (<span class="calc-servers-counter">2</span>)
                            </div>
                            <div class="calc-section__total calc-total">
                                <div class="calc-total__item">
                                    <div class="calc-total__title">
                                        Pro Stunde:
                                    </div>
                                    <div class="calc-total__value">
                                        <span class="calc-total-hour">521.50</span> CHF
                                    </div>
                                </div>
                                <div class="calc-total__item">
                                    <div class="calc-total__title">
                                        Für 30 Tage:
                                    </div>
                                    <div class="calc-total__value">
                                        <span class="calc-total-month">52 122.31</span> CHF
                                    </div>
                                </div>
                            </div>
                            <div class="calc-section__toggler">
                                <svg width="24" height="24">
                                    <use xlink:href="#calc-arrow"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="calc-section__content">
                        <div class="calc-block calc-server">
                            <div class="calc-block__title">
                                Server #<span>1</span>
                            </div>
                            <div class="calc-row">
                                <div class="calc-item">
                                    <div class="calc-item__title">Type:</div>
                                    <div class="calc-select">
                                        <div class="calc-select__current"></div>
                                        <div class="calc-select__items">
                                            <div class="calc-select__item" data-type="linux">
                                                <svg width="24" height="24">
                                                    <use xlink:href="#calc-linux"></use>
                                                </svg>
                                                <span>Linux</span>
                                            </div>
                                            <div class="calc-select__item" data-type="windows">
                                                <svg width="24" height="24">
                                                    <use xlink:href="#calc-windows"></use>
                                                </svg>
                                                <span>Windows</span>
                                            </div>
                                        </div>
                                        <span class="calc-select__btn">
                                            <svg width="24" height="24">
                                                <use xlink:href="#calc-arrow"></use>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="calc-item" data-hour="0.0156" data-month="11.23">
                                    <div class="calc-item__title">
                                        CPU (cores)
                                    </div>
                                    <div class="calc-counter">
                                        <span class="calc-counter__button calc-minus">
                                            <svg width="16" height="16">
                                                <use xlink:href="#calc-minus"></use>
                                            </svg>
                                        </span>
                                        <input type="number" value="1" min="1" max="100" step="1" class="calc-counter__input">
                                        <span class="calc-counter__button calc-plus">
                                            <svg width="16" height="16">
                                                <use xlink:href="#calc-plus"></use>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="calc-item" data-hour="0.0150" data-month="10.80">
                                    <div class="calc-item__title">
                                        RAM (GB)
                                    </div>
                                    <div class="calc-counter">
                                        <span class="calc-counter__button calc-minus">
                                            <svg width="16" height="16">
                                                <use xlink:href="#calc-minus"></use>
                                            </svg>
                                        </span>
                                        <input type="number" value="1" min="1" max="100" step="1" class="calc-counter__input">
                                        <span class="calc-counter__button calc-plus">
                                            <svg width="16" height="16">
                                                <use xlink:href="#calc-plus"></use>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="calc-item" data-hour="0.00034" data-month="0.24">
                                    <div class="calc-item__title">
                                        SSD-Storage (GB)
                                        <div class="calc-item__toggler">
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="calc-counter">
                                        <span class="calc-counter__button calc-minus">
                                            <svg width="16" height="16">
                                                <use xlink:href="#calc-minus"></use>
                                            </svg>
                                        </span>
                                        <input type="number" value="5" min="5" max="100" step="5" class="calc-counter__input">
                                        <span class="calc-counter__button calc-plus">
                                            <svg width="16" height="16">
                                                <use xlink:href="#calc-plus"></use>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="calc-item" data-hour="0.00014" data-month="0.10">
                                    <div class="calc-item__title">
                                        HDD (GB)
                                        <div class="calc-item__toggler">
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="calc-counter">
                                        <span class="calc-counter__button calc-minus">
                                            <svg width="16" height="16">
                                                <use xlink:href="#calc-minus"></use>
                                            </svg>
                                        </span>
                                        <input type="number" value="5" min="5" max="100" step="5" class="calc-counter__input">
                                        <span class="calc-counter__button calc-plus">
                                            <svg width="16" height="16">
                                                <use xlink:href="#calc-plus"></use>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="calc-block__total calc-total">
                                <div class="calc-total__item">
                                    <div class="calc-total__title">
                                        <svg width="16" height="16">
                                            <use xlink:href="#calc-clock"></use>
                                        </svg>
                                        Pro Stunde:
                                    </div>
                                    <div class="calc-total__value">
                                        <span class="calc-total-hour">521.50</span> CHF
                                    </div>
                                </div>
                                <div class="calc-total__item">
                                    <div class="calc-total__title">
                                        <svg width="16" height="16">
                                            <use xlink:href="#calc-calendar"></use>
                                        </svg>
                                        Für 30 Tage:
                                    </div>
                                    <div class="calc-total__value">
                                        <span class="calc-total-month">52 122.31</span> CHF
                                    </div>
                                </div>
                            </div>
                            <div class="calc-block__buttons">
                                <div class="calc-block__button calc-block__button--remove">
                                    <svg width="24" height="42">
                                        <use xlink:href="#calc-remove"></use>
                                    </svg>
                                    Entfernen
                                </div>
                                <div class="calc-block__button calc-block__button--add">
                                    <svg width="24" height="42">
                                        <use xlink:href="#calc-add"></use>
                                    </svg>
                                    Server hinzufügen
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calc-section__footer">
                        <div class="calc-section__total calc-total">
                            <div class="calc-total__item">
                                <div class="calc-total__title">
                                    <svg width="16" height="16">
                                        <use xlink:href="#calc-clock"></use>
                                    </svg>
                                    Pro Stunde:
                                </div>
                                <div class="calc-total__value">
                                    <span class="calc-total-hour">521.50</span> CHF
                                </div>
                            </div>
                            <div class="calc-total__item">
                                <div class="calc-total__title">
                                    <svg width="16" height="16">
                                        <use xlink:href="#calc-calendar"></use>
                                    </svg>
                                    Für 30 Tage:
                                </div>
                                <div class="calc-total__value">
                                    <span class="calc-total-month">52 122.31</span> CHF
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="calc-section calc-network">
                    <div class="calc-section__header calc-block">
                        <div class="calc-row">
                            <div class="calc-section__title">
                                Networking und Security
                            </div>
                            <div class="calc-section__total calc-total">
                                <div class="calc-total__item">
                                    <div class="calc-total__title">
                                        Pro Stunde:
                                    </div>
                                    <div class="calc-total__value">
                                        <span class="calc-total-hour">521.50</span> CHF
                                    </div>
                                </div>
                                <div class="calc-total__item">
                                    <div class="calc-total__title">
                                        Für 30 Tage:
                                    </div>
                                    <div class="calc-total__value">
                                        <span class="calc-total-month">52 122.31</span> CHF
                                    </div>
                                </div>
                            </div>
                            <div class="calc-section__toggler">
                                <svg width="24" height="24">
                                    <use xlink:href="#calc-arrow"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="calc-section__content">
                        <div class="calc-block calc-service">
                            <div class="calc-row">
                                <div class="calc-block__title">Firewall service</div>
                                <div class="calc-item" data-hour="0.03" data-month="21.60">
                                    <div class="calc-item__title">
                                        Anzahl
                                    </div>
                                    <div class="calc-counter">
                                        <span class="calc-counter__button calc-minus">
                                            <svg width="16" height="16">
                                                <use xlink:href="#calc-minus"></use>
                                            </svg>
                                        </span>
                                        <input type="number" value="1" min="1" max="100" step="1" class="calc-counter__input">
                                        <span class="calc-counter__button calc-plus">
                                            <svg width="16" height="16">
                                                <use xlink:href="#calc-plus"></use>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="calc-block__total calc-total">
                                    <div class="calc-total__item">
                                        <div class="calc-total__title">
                                            <svg width="16" height="16">
                                                <use xlink:href="#calc-clock"></use>
                                            </svg>
                                            Pro Stunde:
                                        </div>
                                        <div class="calc-total__value">
                                            <span class="calc-total-hour">521.50</span> CHF
                                        </div>
                                    </div>
                                    <div class="calc-total__item">
                                        <div class="calc-total__title">
                                            <svg width="16" height="16">
                                                <use xlink:href="#calc-calendar"></use>
                                            </svg>
                                            Für 30 Tage:
                                        </div>
                                        <div class="calc-total__value">
                                            <span class="calc-total-month">52 122.31</span> CHF
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="calc-block calc-service">
                            <div class="calc-row">
                                <div class="calc-block__title">Loadbalancer</div>
                                <div class="calc-item" data-hour="0.03" data-month="21.60">
                                    <div class="calc-item__title">
                                        Anzahl
                                    </div>
                                    <div class="calc-counter">
                                        <span class="calc-counter__button calc-minus">
                                            <svg width="16" height="16">
                                                <use xlink:href="#calc-minus"></use>
                                            </svg>
                                        </span>
                                        <input type="number" value="1" min="1" max="100" step="1" class="calc-counter__input">
                                        <span class="calc-counter__button calc-plus">
                                            <svg width="16" height="16">
                                                <use xlink:href="#calc-plus"></use>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="calc-block__total calc-total">
                                    <div class="calc-total__item">
                                        <div class="calc-total__title">
                                            <svg width="16" height="16">
                                                <use xlink:href="#calc-clock"></use>
                                            </svg>
                                            Pro Stunde:
                                        </div>
                                        <div class="calc-total__value">
                                            <span class="calc-total-hour">521.50</span> CHF
                                        </div>
                                    </div>
                                    <div class="calc-total__item">
                                        <div class="calc-total__title">
                                            <svg width="16" height="16">
                                                <use xlink:href="#calc-calendar"></use>
                                            </svg>
                                            Für 30 Tage:
                                        </div>
                                        <div class="calc-total__value">
                                            <span class="calc-total-month">52 122.31</span> CHF
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="calc-block calc-service">
                            <div class="calc-row">
                                <div class="calc-block__title">LAN</div>
                                <div class="calc-item" data-hour="0.0139" data-month="10.01">
                                    <div class="calc-item__title">
                                        Anzahl
                                    </div>
                                    <div class="calc-counter">
                                        <span class="calc-counter__button calc-minus">
                                            <svg width="16" height="16">
                                                <use xlink:href="#calc-minus"></use>
                                            </svg>
                                        </span>
                                        <input type="number" value="1" min="1" max="100" step="1" class="calc-counter__input">
                                        <span class="calc-counter__button calc-plus">
                                            <svg width="16" height="16">
                                                <use xlink:href="#calc-plus"></use>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="calc-block__total calc-total">
                                    <div class="calc-total__item">
                                        <div class="calc-total__title">
                                            <svg width="16" height="16">
                                                <use xlink:href="#calc-clock"></use>
                                            </svg>
                                            Pro Stunde:
                                        </div>
                                        <div class="calc-total__value">
                                            <span class="calc-total-hour">521.50</span> CHF
                                        </div>
                                    </div>
                                    <div class="calc-total__item">
                                        <div class="calc-total__title">
                                            <svg width="16" height="16">
                                                <use xlink:href="#calc-calendar"></use>
                                            </svg>
                                            Für 30 Tage:
                                        </div>
                                        <div class="calc-total__value">
                                            <span class="calc-total-month">52 122.31</span> CHF
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="calc-block calc-wan">
                            <div class="calc-row">
                                <div class="calc-block__title">
                                    WAN (#<span>1</span>)
                                </div>
                                <div class="calc-item">
                                    <div class="calc-item__title">Type:</div>
                                    <div class="calc-select">
                                        <div class="calc-select__current"></div>
                                        <div class="calc-select__items">
                                            <div class="calc-select__item" data-hour="0.041" data-month="29.52">
                                                <span>/29 Subnet (5 IP’s nutzbar)</span>
                                            </div>
                                            <div class="calc-select__item" data-hour="0.07" data-month="50.40">
                                                <span>/28 Subnet (13 IP’s nutzbar)</span>
                                            </div>
                                            <div class="calc-select__item" data-hour="0.12" data-month="86.40">
                                                <span>/27 Subnet (29 IP’s nutzbar)</span>
                                            </div>
                                            <div class="calc-select__item" data-hour="0.22" data-month="158.40">
                                                <span>/26 Subnet (61 IP’s nutzbar)</span>
                                            </div>
                                        </div>
                                        <span class="calc-select__btn">
                                            <svg width="24" height="24">
                                                <use xlink:href="#calc-arrow"></use>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="calc-block__total calc-total">
                                    <div class="calc-total__item">
                                        <div class="calc-total__title">
                                            <svg width="16" height="16">
                                                <use xlink:href="#calc-clock"></use>
                                            </svg>
                                            Pro Stunde:
                                        </div>
                                        <div class="calc-total__value">
                                            <span class="calc-total-hour">521.50</span> CHF
                                        </div>
                                    </div>
                                    <div class="calc-total__item">
                                        <div class="calc-total__title">
                                            <svg width="16" height="16">
                                                <use xlink:href="#calc-calendar"></use>
                                            </svg>
                                            Für 30 Tage:
                                        </div>
                                        <div class="calc-total__value">
                                            <span class="calc-total-month">52 122.31</span> CHF
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="calc-block__buttons">
                                <div class="calc-block__button calc-block__button--remove">
                                    <svg width="24" height="42">
                                        <use xlink:href="#calc-remove"></use>
                                    </svg>
                                    Entfernen
                                </div>
                                <div class="calc-block__button calc-block__button--add">
                                    <svg width="24" height="42">
                                        <use xlink:href="#calc-add"></use>
                                    </svg>
                                    Server hinzufügen
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calc-section__footer">
                        <div class="calc-section__total calc-total">
                            <div class="calc-total__item">
                                <div class="calc-total__title">
                                    <svg width="16" height="16">
                                        <use xlink:href="#calc-clock"></use>
                                    </svg>
                                    Pro Stunde:
                                </div>
                                <div class="calc-total__value">
                                    <span class="calc-total-hour">521.50</span> CHF
                                </div>
                            </div>
                            <div class="calc-total__item">
                                <div class="calc-total__title">
                                    <svg width="16" height="16">
                                        <use xlink:href="#calc-calendar"></use>
                                    </svg>
                                    Für 30 Tage:
                                </div>
                                <div class="calc-total__value">
                                    <span class="calc-total-month">52 122.31</span> CHF
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.pricing-calc -->
</div>

<?php get_footer(); ?>
