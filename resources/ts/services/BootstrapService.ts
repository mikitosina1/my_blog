import type {BootstrapData} from '@/types/Bootstrap';

class BootstrapService {
    private data: BootstrapData | null = null;

    public set(data: BootstrapData): void {
        this.data = data;
    }

    public get(): BootstrapData {
        if (!this.data) {
            throw new Error(
                'Application bootstrap has not been initialized.',
            );
        }

        return this.data;
    }

    public getLocale(): string {
        return this.get().locale;
    }

    public getTranslations(): BootstrapData['translations'] {
        return this.get().translations;
    }

    public getModules(): BootstrapData['modules'] {
        return this.get().modules;
    }
}

export default new BootstrapService();