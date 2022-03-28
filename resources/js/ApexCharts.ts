import ApexCharts from 'apexcharts';

declare global {
    interface Window {
        ApexCharts: typeof ApexCharts
    }
}