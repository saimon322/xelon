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
        <div class="xln-container">
            <div class="xln-content">
                <h2 class="xln-content__title">
                    <img src="<?php echo TEMPLATE_URL; ?>/xln-layout/dist/img/icon/pricing-calc.svg" alt="">
                    Preisrechner
                </h2>
                <p>Erstellen Sie Ihre eigene Infrastruktur und nutzen Sie den Kalkulator, um einen besseren Überblick über Ihre Kosten zu erhalten. Fügen Sie einfach Elemente hinzu, die Sie verwenden möchten, und erhalten Sie die Kostenschätzung</p>
            </div>
            
            <div class="calc">
                <div class="calc__container xln-container">
                    <div class="calc-section">
                        <div class="calc-section__header calc-block">
                            <div class="calc-row">
                                <div class="calc-section__title">
                                    Infrastruktur
                                    (<span class="calc-section__counter">2</span>)
                                </div>
                                <div class="calc-total calc-total--top">
                                    <div class="calc-total__line">
                                        <div class="calc-total__title">
                                            Pro Stunde:
                                        </div>
                                        <div class="calc-total__value">
                                            <span>521.50</span> CHF
                                        </div>
                                    </div>
                                    <div class="calc-total__line">
                                        <div class="calc-total__title">
                                            Für 30 Tage:
                                        </div>
                                        <div class="calc-total__value">
                                            <span>52 122.31</span> CHF
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
                            <div class="calc-block">
                                <div class="calc-row">
                                    <div class="calc-block__title">Server #2</div>
                                    <div class="calc-total calc-total--block">
                                        <div class="calc-total__line">
                                            <div class="calc-total__title">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#calc-clock"></use>
                                                </svg>
                                                Pro Stunde:
                                            </div>
                                            <div class="calc-total__value">
                                                <span>521.50</span> CHF
                                            </div>
                                        </div>
                                        <div class="calc-total__line">
                                            <div class="calc-total__title">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#calc-calendar"></use>
                                                </svg>
                                                Für 30 Tage:
                                            </div>
                                            <div class="calc-total__value">
                                                <span>52 122.31</span> CHF
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="calc-block">
                                <div class="calc-row">
                                    <div class="calc-block__title">Server #1</div>
                                    <div class="calc-total calc-total--block">
                                        <div class="calc-total__line">
                                            <div class="calc-total__title">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#calc-clock"></use>
                                                </svg>
                                                Pro Stunde:
                                            </div>
                                            <div class="calc-total__value">
                                                <span>521.50</span> CHF
                                            </div>
                                        </div>
                                        <div class="calc-total__line">
                                            <div class="calc-total__title">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#calc-calendar"></use>
                                                </svg>
                                                Für 30 Tage:
                                            </div>
                                            <div class="calc-total__value">
                                                <span>52 122.31</span> CHF
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="calc-section">
                        <div class="calc-section__header calc-block">
                            <div class="calc-row calc-row--center">
                                <div class="calc-section__title">
                                    Networking und Security
                                </div>
                                <div class="calc-total calc-total--top">
                                    <div class="calc-total__line">
                                        <div class="calc-total__title">
                                            Pro Stunde:
                                        </div>
                                        <div class="calc-total__value">
                                            <span>521.50</span> CHF
                                        </div>
                                    </div>
                                    <div class="calc-total__line">
                                        <div class="calc-total__title">
                                            Für 30 Tage:
                                        </div>
                                        <div class="calc-total__value">
                                            <span>52 122.31</span> CHF
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
                            <div class="calc-block">
                                <div class="calc-row calc-row--center">
                                    <div class="calc-block__title">Firewall service</div>
                                    <div class="calc-total calc-total--block">
                                        <div class="calc-total__line">
                                            <div class="calc-total__title">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#calc-clock"></use>
                                                </svg>
                                                Pro Stunde:
                                            </div>
                                            <div class="calc-total__value">
                                                <span>521.50</span> CHF
                                            </div>
                                        </div>
                                        <div class="calc-total__line">
                                            <div class="calc-total__title">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#calc-calendar"></use>
                                                </svg>
                                                Für 30 Tage:
                                            </div>
                                            <div class="calc-total__value">
                                                <span>52 122.31</span> CHF
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="calc-block">
                                <div class="calc-row calc-row--center">
                                    <div class="calc-block__title">Loadbalancer</div>
                                    <div class="calc-total calc-total--block">
                                        <div class="calc-total__line">
                                            <div class="calc-total__title">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#calc-clock"></use>
                                                </svg>
                                                Pro Stunde:
                                            </div>
                                            <div class="calc-total__value">
                                                <span>521.50</span> CHF
                                            </div>
                                        </div>
                                        <div class="calc-total__line">
                                            <div class="calc-total__title">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#calc-calendar"></use>
                                                </svg>
                                                Für 30 Tage:
                                            </div>
                                            <div class="calc-total__value">
                                                <span>52 122.31</span> CHF
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="calc-block">
                                <div class="calc-row calc-row--center">
                                    <div class="calc-block__title">LAN</div>
                                    <div class="calc-total calc-total--block">
                                        <div class="calc-total__line">
                                            <div class="calc-total__title">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#calc-clock"></use>
                                                </svg>
                                                Pro Stunde:
                                            </div>
                                            <div class="calc-total__value">
                                                <span>521.50</span> CHF
                                            </div>
                                        </div>
                                        <div class="calc-total__line">
                                            <div class="calc-total__title">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#calc-calendar"></use>
                                                </svg>
                                                Für 30 Tage:
                                            </div>
                                            <div class="calc-total__value">
                                                <span>52 122.31</span> CHF
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="calc-block">
                                <div class="calc-row calc-row--center">
                                    <div class="calc-block__title">WAN (#1)</div>
                                    <div class="calc-total calc-total--block">
                                        <div class="calc-total__line">
                                            <div class="calc-total__title">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#calc-clock"></use>
                                                </svg>
                                                Pro Stunde:
                                            </div>
                                            <div class="calc-total__value">
                                                <span>521.50</span> CHF
                                            </div>
                                        </div>
                                        <div class="calc-total__line">
                                            <div class="calc-total__title">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#calc-calendar"></use>
                                                </svg>
                                                Für 30 Tage:
                                            </div>
                                            <div class="calc-total__value">
                                                <span>52 122.31</span> CHF
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="calc-block">
                                <div class="calc-row calc-row--center">
                                    <div class="calc-block__title">WAN (#2)</div>
                                    <div class="calc-total calc-total--block">
                                        <div class="calc-total__line">
                                            <div class="calc-total__title">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#calc-clock"></use>
                                                </svg>
                                                Pro Stunde:
                                            </div>
                                            <div class="calc-total__value">
                                                <span>521.50</span> CHF
                                            </div>
                                        </div>
                                        <div class="calc-total__line">
                                            <div class="calc-total__title">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#calc-calendar"></use>
                                                </svg>
                                                Für 30 Tage:
                                            </div>
                                            <div class="calc-total__value">
                                                <span>52 122.31</span> CHF
                                            </div>
                                        </div>
                                    </div>
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
