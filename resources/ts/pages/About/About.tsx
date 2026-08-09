import './About.scss';

import {
    BookOpen,
    BriefcaseBusiness,
    Code2,
    Cpu,
    Languages,
    Mail,
    UserRound,
} from 'lucide-react';

import tr from '@/services/TranslationService';

import GithubIcon from '@/components/ui/icons/GithubIcon';
import LinkedinIcon from '@/components/ui/icons/LinkedinIcon';
import TelegramIcon from '@/components/ui/icons/TelegramIcon';
import MailIcon from '@/components/ui/icons/MailIcon';
import XingIcon from "@/components/ui/icons/XingIcon";

import { technologies } from './technologies';

export default function About() {
    return (
        <div className="about-page">
            <section className="about-page__hero">
                <div className="about-page__socials">
                    <a
                        href="https://github.com/mikitosina1"
                        target="_blank"
                        rel="noreferrer"
                        aria-label="GitHub"
                        className="about-page__social"
                    >
                        <GithubIcon alt="GitHub" />
                    </a>

                    <a
                        href="https://www.linkedin.com/in/mykyta-zarichnyi-b63b51252"
                        target="_blank"
                        rel="noreferrer"
                        aria-label="LinkedIn"
                        className="about-page__social"
                    >
                        <LinkedinIcon alt="LinkedIn" />
                    </a>

                    <a
                        href="https://www.xing.com/profile/Mykyta_Zarichnyi"
                        target="_blank"
                        rel="noreferrer"
                        aria-label="Xing"
                        className="about-page__social"
                    >
                        <XingIcon alt="Xing" />
                    </a>

                    <a
                        href="https://t.me/mikitosina"
                        target="_blank"
                        rel="noreferrer"
                        aria-label="Telegram"
                        className="about-page__social"
                    >
                        <TelegramIcon alt="Telegram" />
                    </a>

                    <a
                        href="mailto:mikitosina27@gmail.com"
                        aria-label="Email"
                        className="about-page__social"
                    >
                        <MailIcon alt="Email" />
                    </a>
                </div>

                <div className="about-page__hero-content">
                    <p className="about-page__eyebrow">
                        {tr.t('about.hero.role')}
                    </p>

                    <h1>
                        {tr.t('about.hero.greeting')}
                    </h1>

                    <p className="about-page__hero-description">
                        {tr.t('about.hero.description')}
                    </p>
                </div>
            </section>

            <section className="about-page__section">
                <div className="about-page__section-heading">
                    <UserRound size={24} />

                    <p className="about-page__section-header">
                        {tr.t('about.about.title')}
                    </p>
                </div>

                <div className="about-page__text">
                    <p>
                        {tr.t('about.about.text')}
                    </p>

                    <p>
                        {tr.t('about.about.text_2')}
                    </p>
                </div>
            </section>

            <section className="about-page__section">
                <div className="about-page__section-heading">
                    <Code2 size={20} />

                    <p className="about-page__section-header">
                        {tr.t('about.technology.title')}
                    </p>
                </div>

                <div className="about-page__technologies">
                    {technologies.map((group) => (
                        <div
                            key={group.key}
                            className="about-page__technology-group"
                        >
                            <h3>
                                {tr.t(`about.technology.${group.key}`)}
                            </h3>

                            <div className="about-page__technology-list">
                                {group.technologies.map((technology) => (
                                    <span
                                        key={technology}
                                        className="about-page__technology"
                                    >
                                        {technology}
                                    </span>
                                ))}
                            </div>
                        </div>
                    ))}
                </div>
            </section>

            <section className="about-page__section">
                <div className="about-page__section-heading">
                    <Cpu size={20} />

                    <h2>
                        {tr.t('about.approach.title')}
                    </h2>
                </div>

                <div className="about-page__approach">
                    <article className="about-page__approach-card">
                        <span className="about-page__approach-number">
                            01
                        </span>

                        <h3>
                            {tr.t('about.approach.architecture.title')}
                        </h3>

                        <p>
                            {tr.t('about.approach.architecture.text')}
                        </p>
                    </article>

                    <article className="about-page__approach-card">
                        <span className="about-page__approach-number">
                            02
                        </span>

                        <h3>
                            {tr.t('about.approach.code_quality.title')}
                        </h3>

                        <p>
                            {tr.t('about.approach.code_quality.text')}
                        </p>
                    </article>

                    <article className="about-page__approach-card">
                        <span className="about-page__approach-number">
                            03
                        </span>

                        <h3>
                            {tr.t('about.approach.problem_solving.title')}
                        </h3>

                        <p>
                            {tr.t('about.approach.problem_solving.text')}
                        </p>
                    </article>

                    <article className="about-page__approach-card">
                        <span className="about-page__approach-number">
                            04
                        </span>

                        <h3>
                            {tr.t('about.approach.learning.title')}
                        </h3>

                        <p>
                            {tr.t('about.approach.learning.text')}
                        </p>
                    </article>
                </div>
            </section>

            <section className="about-page__section">
                <div className="about-page__section-heading">
                    <BriefcaseBusiness size={20} />

                    <h2>
                        {tr.t('about.work.title')}
                    </h2>
                </div>

                <div className="about-page__work">
                    <article className="about-page__work-item">
                        <h3>
                            {tr.t('about.work.backend.title')}
                        </h3>

                        <p>
                            {tr.t('about.work.backend.text')}
                        </p>
                    </article>

                    <article className="about-page__work-item">
                        <h3>
                            {tr.t('about.work.ecommerce.title')}
                        </h3>

                        <p>
                            {tr.t('about.work.ecommerce.text')}
                        </p>
                    </article>

                    <article className="about-page__work-item">
                        <h3>
                            {tr.t('about.work.architecture.title')}
                        </h3>

                        <p>
                            {tr.t('about.work.architecture.text')}
                        </p>
                    </article>

                    <article className="about-page__work-item">
                        <h3>
                            {tr.t('about.work.integrations.title')}
                        </h3>

                        <p>
                            {tr.t('about.work.integrations.text')}
                        </p>
                    </article>

                    <article className="about-page__work-item">
                        <h3>
                            {tr.t('about.work.databases.title')}
                        </h3>

                        <p>
                            {tr.t('about.work.databases.text')}
                        </p>
                    </article>

                    <article className="about-page__work-item">
                        <h3>
                            {tr.t('about.work.infrastructure.title')}
                        </h3>

                        <p>
                            {tr.t('about.work.infrastructure.text')}
                        </p>
                    </article>

                    <article className="about-page__work-item">
                        <h3>
                            {tr.t('about.work.performance.title')}
                        </h3>

                        <p>
                            {tr.t('about.work.performance.text')}
                        </p>
                    </article>
                </div>
            </section>

            <section className="about-page__section about-page__section--personal">
                <div className="about-page__section-heading">
                    <BookOpen size={20} />

                    <h2>
                        {tr.t('about.outside.title')}
                    </h2>
                </div>

                <div className="about-page__text">
                    <p>
                        {tr.t('about.outside.text')}
                    </p>

                    <p>
                        {tr.t('about.outside.text_2')}
                    </p>

                    <p>
                        {tr.t('about.outside.text_3')}
                    </p>
                </div>
            </section>

            <section className="about-page__section">
                <div className="about-page__section-heading">
                    <Languages size={20} />

                    <h2>
                        {tr.t('about.languages.title')}
                    </h2>
                </div>

                <div className="about-page__languages">
                    <div className="about-page__language">
                        <span>
                            {tr.t('about.languages.german')}
                        </span>

                        <strong>
                            {tr.t('about.languages.german_level')}
                        </strong>
                    </div>

                    <div className="about-page__language">
                        <span>
                            {tr.t('about.languages.english')}
                        </span>

                        <strong>
                            {tr.t('about.languages.english_level')}
                        </strong>
                    </div>

                    <div className="about-page__language">
                        <span>
                            {tr.t('about.languages.ukrainian')}
                        </span>

                        <strong>
                            {tr.t('about.languages.ukrainian_level')}
                        </strong>
                    </div>

                    <div className="about-page__language">
                        <span>
                            {tr.t('about.languages.russian')}
                        </span>

                        <strong>
                            {tr.t('about.languages.russian_level')}
                        </strong>
                    </div>
                </div>
            </section>

            <section className="about-page__contact">
                <div className="about-page__contact-icon">
                    <Mail size={22} />
                </div>

                <h2>
                    {tr.t('about.contact.title')}
                </h2>

                <p>
                    {tr.t('about.contact.text')}
                </p>

                <a
                    href="mailto:mikitosina27@gmail.com"
                    className="about-page__contact-link"
                >
                    mikitosina27@gmail.com
                </a>
            </section>
        </div>
    );
}