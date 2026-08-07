declare global {
    interface Localization {
        Localization: {
            locale: string;

            translations: Record<string, any>;
        };
    }
}

class TranslationService {

    t(path: string): string {

        const parts = path.split('.');

        let current: any = window.Localization.translations;

        for (const part of parts) {
            current = current?.[part];
        }

        return current ?? path;
    }

}

export default new TranslationService();
