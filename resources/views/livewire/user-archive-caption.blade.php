<div class="post-caption p-1">
  <div class="action-button">
    <button wire:click="incrementOwnReaction('{{ $archive->id }}')" class="rounded-md bg-red-500 hover:bg-slate-400 text-xs text-white p-1 px-3 mx-1"><i class="fa fa-heart" aria-hidden="true"></i> MasyaAllah</button>
    <button class="rounded-md bg-blue-500 hover:bg-slate-400 text-xs text-white p-1 px-3 mx-1" onclick="copySource({{ "\"" .$archive->source. "\""}})" ><i class="fa fa-file" aria-hidden="true"></i> Sumber</button>
  </div>
  <div class="caption p-1">
    <p class="text-xs font-serif text-gray-400 likes-count" style="margin-bottom:0"><span>{{$archive->likes}}</span> reaksi</p>
    <p class="text-sm font-serif text-left text-gray-500" style="margin-bottom:2px">
      {{$archive->captions}}
    </p>
    <p class="text-xs font-serif text-gray-500 text-right post-date" style="margin-bottom:0">{{date("d M Y, H:i", strtotime($archive->created_at))}}</p>
  </div>
</div>
