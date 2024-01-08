/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './*.{html,php}',
    './app/view/templates/*.{html,php}',
    './app/view/js/*.{html,js}',
  ],
  theme: {
    extend: {
      maxWidth:{
        'screen-2xl':'1600px',
        'screen-xl':'1500px',
        'screen-1400':'1400px',
        'screen-xs':'1300px',
        'screen-1200':'1200px',
        'screen-sm':'1100px',
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
      'backGuardianes': "url('../../images/banner1Guardianes.svg')",
      'backLambo': "url('../../images/lambo.svg')",
    },
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      'back': '#020510',
      'pink': '#FF2C78',
      'grey': '#9E9E9E',
      'greyBotones': '#FFFFFF1A',
      'white': '#FFF',
      'whiteAdmin': '#F8F9FA',
      'login': '#FFFFFF33',
      'backInputs': '#020510B3',
      'bermuda': '#78dcca',
    },
  },
  plugins: [],
}

