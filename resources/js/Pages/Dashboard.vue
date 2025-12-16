<template>
    <Head title="Dashboard - Gestión Clínica" />

    <AuthenticatedLayout>
        <template #header>
            <!-- KPIs -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-8">
                <CardStats
                    statSubtitle="Pacientes"
                    :statTitle="Kpis.PatientsAll"
                    statIconName="fas fa-user-injured"
                    statIconColor="bg-blue-500"
                />
                <CardStats
                    statSubtitle="Medicamentos"
                    :statTitle="Kpis.DrugsAll"
                    statIconName="fas fa-pills"
                    statIconColor="bg-teal-500"
                />
                <CardStats
                    statSubtitle="Citas"
                    :statTitle="Kpis.AppointmentsAll"
                    statIconName="fas fa-calendar-check"
                    statIconColor="bg-purple-500"
                />
            </div>

            <!-- GRÁFICA -->
            <apexchart
                type="bar"
                height="350"
                :options="chartOptions"
                :series="series"
            />
        </template>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'
import CardStats from '@/Components/CardStats.vue'
import ApexChart from 'vue3-apexcharts'

export default {
    components: {
        AuthenticatedLayout,
        Head,
        CardStats,
        apexchart: ApexChart,
    },

    props: {
        Kpis: {
            type: Object,
            required: true,
        },
    },

    computed: {
        series() {
            return [
                {
                    name: 'Totales',
                    data: [
                        this.Kpis.PatientsAll,
                        this.Kpis.DrugsAll,
                        this.Kpis.AppointmentsAll,
                    ],
                },
            ]
        },

        chartOptions() {
            return {
                chart: {
                    toolbar: { show: false },
                },
                plotOptions: {
                    bar: {
                        distributed: true,
                        columnWidth: '45%',
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                colors: ['#3b82f6', '#14b8a6', '#8b5cf6'],
                xaxis: {
                    categories: ['Pacientes', 'Medicamentos', 'Citas'],
                },
            }
        },
    },
}
</script>
