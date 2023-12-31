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
      '10': '10px',
      '12': '12px',
      '15': '15px',
      '18.75': '18.75px',
      '22': '22px',
      '30': '30px',
      '3xl': '1.953rem',
      '4xl': '2.441rem',
      '5xl': '3.052rem',
    },
    fontWeight: {
      '400': '400',
      500: '500',
      600: '600',
    },
    backgroundImage: {
      'backLogin': "url('../../images/backgroundLogin.svg')",
    },
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      'back': '#020510',
      'pink': '#FF2C78',
      'grey': '#9E9E9E',
      'greyBotones': '#FFFFFF1A',
      'white': '#FFF',
      'login': '#FFFFFF33',
      'backInputs': '#020510B3',
      'bermuda': '#78dcca',
    },
  },
  plugins: [],
}

