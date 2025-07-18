<template>
    <div
        class="relative flex flex-col min-w-0 break-words bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
        <div class="flex-auto p-5">
            <div class="flex flex-wrap items-center">
                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                    <h5 class="text-gray-500 dark:text-gray-300 uppercase font-bold text-xs tracking-wider">
                        {{ statSubtitle }}
                    </h5>
                    <span class="font-semibold text-2xl text-gray-800 dark:text-white block mt-1">
                        {{ statTitle }}
                    </span>
                </div>
                <div class="relative w-auto pl-4 flex-initial">
                    <div :class="[
                        'text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full',
                        statIconColor
                    ]">
                        <i :class="statIconName" class="text-lg"></i>
                    </div>
                </div>
            </div>
            <p class="text-sm text-gray-500 dark:text-gray-300 mt-4">
                <span :class="statPercentColor" class="font-semibold">
                    <i :class="[
                        statArrow === 'up' ? 'fas fa-arrow-up' : 'fas fa-arrow-down',
                        'mr-1'
                    ]"></i>
                    {{ statPercent }}%
                </span>
                <span class="whitespace-nowrap ml-1">
                    {{ statDescripition }}
                </span>
            </p>
        </div>
    </div>
</template>

<script>
export default {
    name: "CardStats",
    props: {
        statSubtitle: {
            type: String,
            default: "Pacientes",
        },
        statTitle: {
            type: String,
            default: "2,356",
        },
        statArrow: {
            default: "up",
            validator: function (value) {
                return ["up", "down"].indexOf(value) !== -1;
            },
        },
        statPercent: {
            type: String,
            default: "12",
        },
        statPercentColor: {
            type: String,
            default: "text-emerald-500",
        },
        statDescripition: {
            type: String,
            default: "Desde el mes pasado",
        },
        statIconName: {
            type: String,
            default: "fas fa-user-injured",
        },
        statIconColor: {
            type: String,
            default: "bg-blue-500",
        },
    },
};
</script>