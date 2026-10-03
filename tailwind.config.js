/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./public/**/*.php",
    "./app/views/**/*.php",
    "./public/assets/js/**/*.js",
  ],
  theme: { 
    extend: {
      colors: {
          brand: {
            primer: 'DC2626',
            hoverPrimer: 'B91C1C',
            softPrimer: 'FEF2F2',
            borderColor: 'E2E8F0',
            bgColor: 'F8FAFC',
            cardColor: 'FFFFFF',
          },
          ink: {
            titleColor: '0F172A',
            contentColor: '475569',
          },
      },
      fontFamily: {
        title: ['Inter', 'system-ui', 'sans-serif'],
        display: ['"Plus Jakarta Sans"', 'Inter', 'sans-serif'],
      }
    } 
  },
  plugins: [],
};