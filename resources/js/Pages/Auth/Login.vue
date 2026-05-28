<script setup>
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    platformName: {
        type: String,
        required: true,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post('/login', {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head :title="`Sign in to ${platformName}`" />

    <div class="relative min-h-screen overflow-hidden bg-transparent px-6 py-12 text-slate-950">
        <div class="absolute inset-0 -z-10">
            <div class="absolute left-[8%] top-[14%] h-48 w-48 rounded-full bg-sky-200/45 blur-3xl"></div>
            <div class="absolute bottom-[18%] right-[10%] h-72 w-72 rounded-full bg-amber-200/40 blur-3xl"></div>
        </div>

        <div class="mx-auto grid min-h-[calc(100vh-6rem)] max-w-6xl items-center gap-10 lg:grid-cols-[1.1fr_0.9fr]">
            <section class="max-w-2xl">
                <p class="text-sm font-semibold uppercase tracking-[0.38em] text-sky-700">
                    Ride demand forecasting
                </p>
                <h1 class="mt-6 text-5xl font-semibold tracking-[-0.04em] text-slate-950 sm:text-6xl">
                    {{ platformName }}
                </h1>
                <p class="mt-6 max-w-xl text-lg leading-8 text-slate-600">
                    Internal forecasting software for ride hailing teams to predict demand using calendar features,
                    temporal profiles, and event activity across the city.
                </p>

                <div class="mt-10 grid gap-4 sm:grid-cols-3">
                    <div class="rounded-3xl border border-black/5 bg-white/65 p-5 shadow-[0_15px_50px_rgba(15,23,42,0.06)] backdrop-blur">
                        <p class="text-xs uppercase tracking-[0.24em] text-slate-500">Signals</p>
                        <p class="mt-2 text-lg font-semibold text-slate-950">Calendar-aware</p>
                    </div>
                    <div class="rounded-3xl border border-black/5 bg-white/65 p-5 shadow-[0_15px_50px_rgba(15,23,42,0.06)] backdrop-blur">
                        <p class="text-xs uppercase tracking-[0.24em] text-slate-500">Profiles</p>
                        <p class="mt-2 text-lg font-semibold text-slate-950">Temporal patterns</p>
                    </div>
                    <div class="rounded-3xl border border-black/5 bg-white/65 p-5 shadow-[0_15px_50px_rgba(15,23,42,0.06)] backdrop-blur">
                        <p class="text-xs uppercase tracking-[0.24em] text-slate-500">Context</p>
                        <p class="mt-2 text-lg font-semibold text-slate-950">Events and surges</p>
                    </div>
                </div>
            </section>

            <section class="rounded-[2rem] border border-black/5 bg-white/80 p-8 shadow-[0_30px_80px_rgba(15,23,42,0.12)] backdrop-blur sm:p-10">
                <div class="max-w-md">
                    <p class="text-sm font-semibold uppercase tracking-[0.32em] text-amber-600">Internal access</p>
                    <h2 class="mt-4 text-3xl font-semibold tracking-tight text-slate-950">
                        Sign in with your work account
                    </h2>
                    <p class="mt-3 text-base leading-7 text-slate-600">
                        Accounts will be provisioned by the team. Registration is intentionally disabled at this stage.
                    </p>
                </div>

                <form class="mt-10 space-y-6" @submit.prevent="submit">
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700" for="email">Email address</label>
                        <input
                            id="email"
                            v-model="form.email"
                            type="email"
                            autocomplete="email"
                            class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-base text-slate-950 outline-none transition placeholder:text-slate-400 focus:border-sky-500 focus:ring-4 focus:ring-sky-500/10"
                            placeholder="ops@rideq.company"
                        >
                        <p v-if="form.errors.email" class="mt-2 text-sm font-medium text-rose-600">
                            {{ form.errors.email }}
                        </p>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700" for="password">Password</label>
                        <input
                            id="password"
                            v-model="form.password"
                            type="password"
                            autocomplete="current-password"
                            class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-base text-slate-950 outline-none transition placeholder:text-slate-400 focus:border-sky-500 focus:ring-4 focus:ring-sky-500/10"
                            placeholder="Enter your password"
                        >
                        <p v-if="form.errors.password" class="mt-2 text-sm font-medium text-rose-600">
                            {{ form.errors.password }}
                        </p>
                    </div>

                    <label class="flex items-center gap-3 text-sm text-slate-600">
                        <input
                            v-model="form.remember"
                            type="checkbox"
                            class="h-4 w-4 rounded border-slate-300 text-slate-950 focus:ring-sky-500"
                        >
                        Keep me signed in on this device
                    </label>

                    <button
                        class="inline-flex w-full items-center justify-center rounded-full bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800 disabled:cursor-not-allowed disabled:opacity-70"
                        type="submit"
                        :disabled="form.processing"
                    >
                        {{ form.processing ? 'Signing in...' : 'Sign in to RideQ' }}
                    </button>
                </form>
            </section>
        </div>
    </div>
</template>
