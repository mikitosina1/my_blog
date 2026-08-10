import fs from 'fs/promises';
import path from 'path';

async function collectModuleAssetsPaths(paths, modulesPath) {
    const rootPath = __dirname;
    const modulesDirectory = path.join(rootPath, modulesPath);
    const moduleStatusesPath = path.join(rootPath, 'modules_statuses.json');

    try {
        const moduleStatusesContent = await fs.readFile(
            moduleStatusesPath,
            'utf-8',
        );

        const moduleStatuses = JSON.parse(moduleStatusesContent);
        const moduleDirectories = await fs.readdir(modulesDirectory);

        const reactModules = [];

        for (const moduleDir of moduleDirectories) {
            if (moduleDir === '.DS_Store') {
                continue;
            }

            if (moduleStatuses[moduleDir] !== true) {
                continue;
            }

            const modulePath = path.join(modulesDirectory, moduleDir);

            /*
             * Existing module assets
             */
            const viteConfigPath = path.join(
                modulePath,
                'vite.config.js',
            );

            try {
                const stat = await fs.stat(viteConfigPath);

                if (stat.isFile()) {
                    const moduleConfig = await import(viteConfigPath);

                    if (
                        moduleConfig.paths &&
                        Array.isArray(moduleConfig.paths)
                    ) {
                        paths.push(...moduleConfig.paths);
                    }
                }
            } catch {
                // Module has no Vite asset configuration.
            }

            /*
             * React module
             */
            const reactEntryPath = path.join(
                modulePath,
                'resources',
                'ts',
                'index.ts',
            );

            try {
                const stat = await fs.stat(reactEntryPath);

                if (stat.isFile()) {
                    reactModules.push({
                        name: moduleDir,
                        path: reactEntryPath,
                    });
                }
            } catch {
                // Module has no React entry point.
            }
        }

        await generateReactModuleRegistry(reactModules);
    } catch (error) {
        console.error(
            'Error reading module statuses or module configurations:',
            error,
        );
    }

    return paths;
}

async function generateReactModuleRegistry(modules) {
    const registryDirectory = path.join(
        __dirname,
        'resources',
        'ts',
        'app',
        'generated',
    );

    const registryPath = path.join(
        registryDirectory,
        'modules.ts',
    );

    await fs.mkdir(registryDirectory, {
        recursive: true,
    });

    const imports = modules.map((module, index) => {
        const relativePath = path
            .relative(
                registryDirectory,
                module.path,
            )
            .replace(/\\/g, '/')
            .replace(/\.ts$/, '');

        const importPath = relativePath.startsWith('.')
            ? relativePath
            : `./${relativePath}`;

        return `import module${index} from '${importPath}';`;
    });

    const moduleList = modules
        .map((_, index) => `module${index}`)
        .join(',\n    ');

    const content = `// THIS FILE IS AUTO-GENERATED.
// DO NOT EDIT MANUALLY.

${imports.join('\n')}

const modules = [
    ${moduleList}
];

export default modules;
`;

    await fs.writeFile(
        registryPath,
        content,
        'utf-8',
    );
}

export default collectModuleAssetsPaths;