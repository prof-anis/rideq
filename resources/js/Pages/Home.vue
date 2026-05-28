<script setup>
defineProps({
    appName: {
        type: String,
        required: true,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <div class="min-h-screen bg-slate-950 text-white">
        <div class="mx-auto flex min-h-screen max-w-5xl flex-col justify-center px-6 py-16">
            <p class="text-sm font-medium uppercase tracking-[0.35em] text-cyan-300">
                Inertia + Laravel
            </p>

            <h1 class="mt-6 max-w-3xl text-4xl font-semibold tracking-tight text-white sm:text-6xl">
                {{ appName }} is ready for Inertia.js with Vue 3.
            </h1>

            <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-300">
                Your Laravel backend is now serving an Inertia page, and Vite is configured
                to compile Vue single-file components.
            </p>

            <div class="mt-10 flex flex-wrap gap-4 text-sm text-slate-200">
                <div class="rounded-full border border-white/10 bg-white/5 px-4 py-2">
                    Laravel {{ laravelVersion }}
                </div>
                <div class="rounded-full border border-white/10 bg-white/5 px-4 py-2">
                    PHP {{ phpVersion }}
                </div>
                <div class="rounded-full border border-cyan-400/30 bg-cyan-400/10 px-4 py-2 text-cyan-100">
                    Vue 3 via Inertia
                </div>
            </div>
        </div>
    </div>
</template>
