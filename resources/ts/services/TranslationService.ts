import BootstrapService from './BootstrapService';

class TranslationService {
    public t(key: string): string {
        const [namespace, ...path] = key.split('.');

        const bootstrap = BootstrapService.get();

        let value: unknown;

        if (namespace in bootstrap.translations.core) {
            value = bootstrap.translations.core[namespace];
        } else {
            value = bootstrap.modules[namespace];
        }

        for (const part of path) {
            if (
                typeof value !== 'object' ||
                value === null ||
                !(part in value)
            ) {
                return key;
            }

            value = (value as Record<string, unknown>)[part];
        }

        return typeof value === 'string'
            ? value
            : key;
    }
}

export default new TranslationService();