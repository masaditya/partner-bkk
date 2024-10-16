<div id="hs-danger-alert-{{ $partner->id }}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[2000] overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="hs-danger-alert-{{ $partner->id }}-label">
  <div class="m-3 mt-0 transition-all ease-out opacity-0 hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 md:max-w-2xl md:w-full md:mx-auto">
    <div class="relative flex flex-col overflow-hidden bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
      <div class="absolute top-2 end-2">
        <button type="button" class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full size-8 gap-x-2 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-danger-alert-{{ $partner->id }}">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>

      <div class="p-4 overflow-y-auto sm:p-10">
        <div class="flex gap-x-4 md:gap-x-7">
          <!-- Icon -->
          <span class="shrink-0 inline-flex justify-center items-center size-[46px] sm:w-[62px] sm:h-[62px] rounded-full border-4 border-yellow-50 bg-yellow-100 text-yellow-500 dark:bg-yellow-700 dark:border-yellow-600 dark:text-yellow-100">
            <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
          </span>
          <!-- End Icon -->

          <div class="grow">
            <h3 id="hs-danger-alert-{{ $partner->id }}-label" class="mb-2 text-xl font-bold text-gray-800 dark:text-neutral-200">
              Verifikasi Akun Mitra Industri
            </h3>
            <p class="text-gray-500 dark:text-neutral-500">
              Pastikan Anda telah memeriksa informasi terkait mitra industri ini dengan teliti sebelum melanjutkan proses verifikasi. Setelah akun diverifikasi, mitra akan memiliki akses penuh ke layanan yang disediakan. Tindakan ini tidak dapat diurungkan, jadi mohon lakukan dengan hati-hati.
            </p>
          </div>
        </div>
      </div>

      <div class="flex items-center justify-end px-4 py-3 border-t gap-x-2 bg-gray-50 dark:bg-neutral-950 dark:border-neutral-800">
        <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-overlay="#hs-danger-alert-{{ $partner->id }}">
          Batal
        </button>
        <form action="{{ route('partner.verify', $partner->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('PATCH')
            <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-lg gap-x-2 hover:bg-blue-600 disabled:opacity-50 disabled:pointer-events-none">Verifikasi Akun</button>
        </form>
      </div>
    </div>
  </div>
</div>