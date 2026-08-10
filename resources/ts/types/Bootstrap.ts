export interface BootstrapData {
    locale: string;

    translations: {
        core: Record<string, unknown>;
    };

    modules: Record<string, Record<string, unknown>>;
}