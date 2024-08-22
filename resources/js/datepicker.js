const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

function datepicker() {
     return {
          dateString: '',
          startDate: '',
          endDate: '',
          wireModelName: '',

          showDatepicker: false,
          validStartTime: '',
          validEndTime: '',

          validStartMonth: '',
          validEndMonth: '',

          saturdaySelectable: true,
          sundaySelectable: false,
          excludedDates: [],

          month: '',
          year: '',

          numDaysInMonth: '',
          startOfMonthOnDay: '',

          days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

          initApp() {

               let day = new Date (this.startDate);
               this.validStartTime = day.getTime() + day.getTimezoneOffset()*60*1000;
               this.validStartMonth = day.getFullYear()*12+day.getMonth();

               day = new Date(this.endDate);
               this.validEndTime = day.getTime()+ day.getTimezoneOffset()*60*1000;
               this.validEndMonth = day.getFullYear()*12+day.getMonth();

               day = new Date();
               this.month = day.getMonth();
               this.year = day.getFullYear();

               this.getMonthData();
          },
          getFormattedDateString (day) {
               return day.getFullYear()+'-'+('0'+(day.getMonth()+1)).slice(-2)+'-'+('0'+day.getDate()).slice(-2);
          },

          incrementMonth() {
               this.year = parseInt((this.year*12 + this.month+1)/12);
               this.month = (this.month+1)%12;
          },

          decrementMonth() {
               this.year = parseInt((this.year*12 + this.month-1)/12);
               this.month = (this.month+11)%12;
          },

          isDateSelected(date) {
               let d = new Date(this.year, this.month, date);
               return this.getFormattedDateString(d) ===  this.dateString;
          },

          selectDate(date) {
               selectedDate = new Date(this.year, this.month, date);
               this.dateString = this.getFormattedDateString(selectedDate);
          },

          isDateSelectable(date) {
               let d = new Date(this.year, this.month, date);
               if (d.getTime() < this.validStartTime) return false;
               if (d.getTime() > this.validEndTime) return false;

               if ( (!this.saturdaySelectable) && (d.getDay() === 6)) return false;
               if ( (!this.sundaySelectable) && (d.getDay() === 0)) return false;

               if (this.excludedDates.includes(this.getFormattedDateString(d))) return false;

               return true;
          },

          isNextMonthValid(month) {
               return (this.year*12 + month+1 <= this.validEndMonth) ;
          },

          isPrevMonthValid(month) {
               return (this.year*12 + month-1 >= this.validStartMonth) ;
          },

          getMonthData() {
               this.numDaysInMonth = new Date(this.year, this.month + 1, 0).getDate();
               this.startOfMonthOnDay = new Date(this.year, this.month).getDay();
          }
     }
}
