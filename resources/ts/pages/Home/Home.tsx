import './Home.scss';

import {
    ArrowRight,
    ExternalLink,
} from 'lucide-react';

import { Link } from 'react-router-dom';

import tr from '@/services/TranslationService';

import { technologies } from './technologies';

export default function Home() {
    return (
        <div className="home-page">
            <section className="home-page__hero">
                <div className="home-page__hero-content">
                    <p className="home-page__eyebrow">
                        {tr.t('about.hero.role')}
                    </p>

                    <h1>
                        {tr.t('about.hero.greeting')}
                    </h1>

                    <p className="home-page__description">
                        {tr.t('about.hero.description')}
                    </p>

                    <div className="home-page__actions">
                        <Link
                            to="/about"
                            className="home-page__button home-page__button--primary"
                        >
                            {tr.t('home.actions.about')}

                            <ArrowRight size={18} />
                        </Link>

                        <a
                            href="https://github.com/mikitosina1"
                            target="_blank"
                            rel="noreferrer"
                            className="home-page__button home-page__button--secondary"
                        >
                            GitHub

                            <ExternalLink size={16} />
                        </a>
                    </div>
                </div>
            </section>

            <section className="home-page__section">
                <div className="home-page__section-heading">
                    <div>
                        <p className="home-page__section-eyebrow">
                            {tr.t('home.directions.eyebrow')}
                        </p>

                        <h2>
                            {tr.t('home.directions.title')}
                        </h2>
                    </div>
                </div>

                <div className="home-page__technology-grid">
                    {technologies.map((group) => {
                        const Icon = group.icon;

                        return (
                            <article
                                key={group.key}
                                className="home-page__technology-card"
                            >
                                <div className="home-page__technology-icon">
                                    <Icon size={22} />
                                </div>

                                <div className="home-page__technology-content">
                                    <h3>
                                        {tr.t(
                                            `about.technology.${group.key}`
                                        )}
                                    </h3>

                                    <div className="home-page__technology-list">
                                        {group.technologies.map(
                                            (technology) => (
                                                <span
                                                    key={technology}
                                                    className="home-page__technology"
                                                >
                                                    {technology}
                                                </span>
                                            )
                                        )}
                                    </div>
                                </div>
                            </article>
                        );
                    })}
                </div>
            </section>

            <section className="home-page__section home-page__section--about">
                <div className="home-page__about-content">
                    <p className="home-page__section-eyebrow">
                        {tr.t('home.about.eyebrow')}
                    </p>

                    <h2>
                        {tr.t('home.about.title')}
                    </h2>

                    <p>
                        {tr.t('home.about.text')}
                    </p>

                    <Link
                        to="/about"
                        className="home-page__text-link"
                    >
                        {tr.t('home.actions.read_more')}

                        <ArrowRight size={17} />
                    </Link>
                </div>
            </section>
        </div>
    );
}