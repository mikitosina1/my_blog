import type {BootstrapData} from '@/types/Bootstrap';

const BASE_URL = '/api/v1';

export async function getBootstrap(): Promise<BootstrapData> {
    const response = await fetch(`${BASE_URL}/app/bootstrap`, {
        headers: {
            Accept: 'application/json',
        },
        credentials: 'same-origin',
    });

    if (!response.ok) {
        throw new Error('Failed to load application bootstrap.');
    }

    return response.json();
}