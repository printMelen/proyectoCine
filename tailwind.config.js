/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './*.{html,php}',
    './assets/templates/*.{html,php}',
    './assets/js/*.{html,js}',
  ],
  theme: {
    extend: {
      maxWidth:{
        'screen-2xl':'1600px',
        'screen-xl':'1500px',
      }
    },
    fontFamily: {
      'Poppins': ['Poppins', 'sans-serif'],
    },
    fontSize: {
      sm: '0.8rem',
      '12': '12px',
      '15': '15px',
      '18.75': '18.75px',
      xl: '1.25rem',
      '2xl': '1.563rem',
      '3xl': '1.953rem',
      '4xl': '2.441rem',
      '5xl': '3.052rem',
    },
    fontWeight: {
      '400': '400',
      500: '500',
      600: '600',
    },
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      'back': '#020510',
      'pink': '#EF2A82',
      'grey': '#9E9E9E',
      'greyBotones': '#FFFFFF1A',
      'white': '#FFF',
      'silver': '#ecebff',
      'bubble-gum': '#ff77e9',
      'bermuda': '#78dcca',
    },
  },
  plugins: [],
}

