<x-dashboard-layout title="لوحة التحكم الرئيسية لمتجر Jolt" description="هذه هي لوحة التحكم للمسؤول لمتجر Jolt"
    keywords="متجر Jolt, مسؤول, لوحة التحكم">



    <div class="flex flex-col justify-start items-start">
        <h2 class="text-slate-800 font-semibold">
            بطاقات الإحصائيات
        </h2>
        <p class="text-slate-500">
            هذا نص وهمي تم إنشاؤه لأغراض العرض فقط.
        </p>
    </div>
    <livewire:dashboard-stats>
        <div class="flex flex-col justify-start items-start">
            <h2 class="text-slate-800 font-semibold">
                إحصائيات الرسوم البيانية
            </h2>
            <p class="text-slate-500">
                هذا نص وهمي تم إنشاؤه لأغراض العرض فقط.
            </p>
        </div>
        <section class="w-full grid md:grid-cols-2 grid-cols-1 gap-3 lg:grid-cols-4 ">
            <article
                class="w-full p-3 md:col-span-1 flex justify-end items-end flex-col  lg:col-span-3 bg-slate-50/40 min-h-[28rem] rounded-md border border-slate-400/35">
                <div
                class="w-full"
                id="hs-single-area-chart"></div>

            </article>

            <article
                class="w-full p-2 md:col-span-1 lg:col-span-1 bg-slate-50/40 min-h-80 rounded-md border border-slate-400/35">
            </article>
        </section>

        </div>
        <script src="https://preline.co/assets/js/hs-apexcharts-helpers.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/lodash/lodash.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            window.addEventListener('load', () => {
              // Apex Single Area Chart
              (function () {
                buildChart('#hs-single-area-chart', (mode) => ({
                  chart: {
                    height: 300,
                    type: 'area',
                    toolbar: {
                      show: false
                    },
                    zoom: {
                      enabled: false
                    },
                    rtl: true, // Enable right-to-left layout
                  },
                  series: [
                    {
                      name: 'الزوار', // Arabic text for "Visitors"
                      data: [180, 51, 60, 38, 88, 50, 40, 52, 88, 80, 60, 70]
                    }
                  ],
                  legend: {
                    show: false
                  },
                  dataLabels: {
                    enabled: false
                  },
                  stroke: {
                    curve: 'straight',
                    width: 2
                  },
                  grid: {
                    strokeDashArray: 2
                  },
                  fill: {
                    type: 'gradient',
                    gradient: {
                      type: 'vertical',
                      shadeIntensity: 1,
                      opacityFrom: 0.1,
                      opacityTo: 0.8
                    }
                  },
                  xaxis: {
                    type: 'category',
                    tickPlacement: 'on',
                    categories: [
  '٦ فبراير ٢٠٢٣',
  '٧ فبراير ٢٠٢٣',
  '٨ فبراير ٢٠٢٣',
  '٩ فبراير ٢٠٢٣',
  '١٠ فبراير ٢٠٢٣',
  '١١ فبراير ٢٠٢٣',
  '١٢ فبراير ٢٠٢٣',
  '١٣ فبراير ٢٠٢٣',
  '١٤ فبراير ٢٠٢٣',
  '١٥ فبراير ٢٠٢٣',
  '١٦ فبراير ٢٠٢٣',
  '١٧ فبراير ٢٠٢٣',
  '١٨ فبراير ٢٠٢٣',
  '١٩ فبراير ٢٠٢٣',
  '٢٠ فبراير ٢٠٢٣',
  '٢١ فبراير ٢٠٢٣',
  '٢٢ فبراير ٢٠٢٣',
  '٢٣ فبراير ٢٠٢٣',
  '٢٤ فبراير ٢٠٢٣',
  '٢٥ فبراير ٢٠٢٣',
  '٢٦ فبراير ٢٠٢٣',
  '٢٧ فبراير ٢٠٢٣',
  '٢٨ فبراير ٢٠٢٣',
  '١ مارس ٢٠٢٣',
  '٢ مارس ٢٠٢٣',
  '٣ مارس ٢٠٢٣',
  '٤ مارس ٢٠٢٣',
  '٥ مارس ٢٠٢٣',
  '٦ مارس ٢٠٢٣',
  '٧ مارس ٢٠٢٣',
  '٨ مارس ٢٠٢٣',
  '٩ مارس ٢٠٢٣',
  '١٠ مارس ٢٠٢٣',
  '١١ مارس ٢٠٢٣',
  '١٢ مارس ٢٠٢٣',
  '١٣ مارس ٢٠٢٣',
  '١٤ مارس ٢٠٢٣',
  '١٥ مارس ٢٠٢٣',
  '١٦ مارس ٢٠٢٣',
  '١٧ مارس ٢٠٢٣',
  '١٨ مارس ٢٠٢٣',
  '١٩ مارس ٢٠٢٣',
  '٢٠ مارس ٢٠٢٣',
  '٢١ مارس ٢٠٢٣',
  '٢٢ مارس ٢٠٢٣',
  '٢٣ مارس ٢٠٢٣',
  '٢٤ مارس ٢٠٢٣',
  '٢٥ مارس ٢٠٢٣',
  '٢٦ مارس ٢٠٢٣',
  '٢٧ مارس ٢٠٢٣',
  '٢٨ مارس ٢٠٢٣',
  '٢٩ مارس ٢٠٢٣',
  '٣٠ مارس ٢٠٢٣',
  '٣١ مارس ٢٠٢٣'
]
,
                    axisBorder: {
                      show: false
                    },
                    axisTicks: {
                      show: false
                    },
                    crosshairs: {
                      stroke: {
                        dashArray: 0
                      },
                      dropShadow: {
                        show: false
                      }
                    },
                    tooltip: {
                      enabled: false
                    },
                    labels: {
                      style: {
                        colors: '#9ca3af',
                        fontSize: '13px',
                        fontFamily: 'Zain, sans-serif', // Use your custom Arabic font
                        fontWeight: 400
                      },
                      formatter: (title) => {
                        let t = title;
                        if (t) {
                          const newT = t.split(' ');
                          t = `${newT[0]} ${newT[1].slice(0, 3)}`;
                        }
                        return t;
                      }
                    }
                  },
                  yaxis: {
                    labels: {
                      align: 'left',
                      minWidth: 0,
                      maxWidth: 140,
                      style: {
                        colors: '#9ca3af',
                        fontSize: '13px',
                        fontFamily: 'Zain, sans-serif', // Use your custom Arabic font
                        fontWeight: 400
                      },
                      formatter: (value) => value >= 1000 ? `${value / 1000}k` : value
                    }
                  },
                  tooltip: {
                    x: {
                      format: 'MMMM yyyy'
                    },
                    y: {
                      formatter: (value) => `${value >= 1000 ? `${value / 1000}k` : value}`
                    },
                    custom: function (props) {
                      const { categories } = props.ctx.opts.xaxis;
                      const { dataPointIndex } = props;
                      const title = categories[dataPointIndex].split(' ');
                      const newTitle = `${title[0]} ${title[1]}`;
                      return buildTooltip(props, {
                        title: newTitle,
                        mode,
                        valuePrefix: '',
                        hasTextLabel: true,
                        markerExtClasses: '!rounded-sm',
                        wrapperExtClasses: 'min-w-28'
                      });
                    }
                  },
                  responsive: [{
                    breakpoint: 568,
                    options: {
                      chart: {
                        height: 300
                      },
                      labels: {
                        style: {
                          colors: '#9ca3af',
                          fontSize: '11px',
                          fontFamily: 'Zain, sans-serif', // Use your custom Arabic font
                          fontWeight: 400
                        },
                        offsetX: -2,
                        formatter: (title) => title.slice(0, 3)
                      },
                      yaxis: {
                        labels: {
                          align: 'left',
                          minWidth: 0,
                          maxWidth: 140,
                          style: {
                            colors: '#9ca3af',
                            fontSize: '11px',
                            fontFamily: 'Zain, sans-serif', // Use your custom Arabic font
                            fontWeight: 400
                          },
                          formatter: (value) => value >= 1000 ? `${value / 1000}k` : value
                        }
                      },
                    },
                  }]
                }), {
                  colors: ['#2563eb', '#9333ea'],
                  fill: {
                    gradient: {
                      stops: [0, 90, 100]
                    }
                  },
                  xaxis: {
                    labels: {
                      style: {
                        colors: '#9ca3af'
                      }
                    }
                  },
                  yaxis: {
                    labels: {
                      style: {
                        colors: '#9ca3af'
                      }
                    }
                  },
                  grid: {
                    borderColor: '#e5e7eb'
                  }
                }, {
                  colors: ['#3b82f6', '#a855f7'],
                  fill: {
                    gradient: {
                      stops: [100, 90, 0]
                    }
                  },
                  xaxis: {
                    labels: {
                      style: {
                        colors: '#a3a3a3',
                      }
                    }
                  },
                  yaxis: {
                    labels: {
                      style: {
                        colors: '#a3a3a3'
                      }
                    }
                  },
                  grid: {
                    borderColor: '#404040'
                  }
                });
              })();
            });
          </script>
</x-dashboard-layout>
