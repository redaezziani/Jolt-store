<div class="w-full mt-10">
    {{-- Loop over the random categories --}}
    <div class="w-full grid gap-3 lg:grid-cols-3">
          @foreach ($categories as $category)
              <div class="w-full flex flex-col gap-2">
                  <div class="w-full flex justify-between items-center">
                      <h2 class="text-slate-800 font-semibold">
                          {{ $category->name }}
                      </h2>
                      <a class="text-primary text-sm font-semibold">
                          عرض الكل
                      </a>
                  </div>
              </div>
          @endforeach
    </div>
  </div>
