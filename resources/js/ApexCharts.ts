import ApexCharts from 'apexcharts';
//TypeScript OMEGALUL here, doing this just cause ApexCharts (probably?) needs it
declare global {
    interface Window {
        ApexCharts: typeof ApexCharts
    }
}
