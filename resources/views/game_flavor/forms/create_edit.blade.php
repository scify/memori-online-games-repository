<form id="gameFlavor-handling-form" class="memoriForm" method="POST"
      action="{{($gameFlavor->id == null ? route('createGameFlavor') : route('editGameFlavor', $gameFlavor->id))}}"
      enctype="multipart/form-data">
    <input type="hidden" name="game_version_id" value="{{$gameVersionId}}">
    <div class="panelContainer">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title"><h4>Create new Memor-i flavor</h4></div>
            </div><!--.panel-heading-->
            <div class="panel-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row example-row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="requiredExpl"><span class="required">*</span> = required</div>
                            <div class="form-group">
                                <div class="inputer">
                                    Flavor name <span class="required">*</span>
                                    <div class="input-wrapper">
                                        <input name="name" type="text"
                                               class="maxlength maxlength-position form-control" maxlength="50"
                                               placeholder="Game title"
                                               value="{{ old('name') != '' ? old('name') : $gameFlavor['name']}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            Description
                            <div class="form-group">
                                <div class="inputer">
                                    <div class="input-wrapper">
                                        <textarea name="description" class="form-control" placeholder="Game description"
                                                  rows="3">{{ old('description') != '' ? old('description') : $gameFlavor['description']}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--<div class="row">--}}
                            {{--<div class="col-md-3">Interface Language</div><!--.col-md-3-->--}}
                            {{--<div class="col-md-9">--}}
                                {{--<select class="form-control selecter" name="interface_lang_id">--}}
                                    {{--@foreach($interfaceLanguages as $interfaceLanguage)--}}
                                        {{--<option value="{{$interfaceLanguage->id}}" {{ old('interface_lang_id') == $interfaceLanguage->id || $gameFlavor['interface_lang_id'] == $interfaceLanguage->id ? 'selected' : ''}}>{{$interfaceLanguage->name}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div><!--.col-md-9-->--}}
                        {{--</div><!--.row-->--}}
                        <div class="row">
                            <div class="col-md-3">Target Language</div><!--.col-md-3-->
                            <div class="col-md-9">
                                <select class="form-control selecter" name="lang_id">
                                    @foreach($languages as $language)
                                        <option value="{{$language->id}}" {{ old('lang_id') == $language->id || $gameFlavor['lang_id'] == $language->id ? 'selected' : ''}}>{{$language->name}}</option>
                                    @endforeach
                                </select>
                            </div><!--.col-md-9-->
                        </div><!--.row-->
                        <div class="row">
                            <div class="col-md-3">Game cover image</div><!--.col-md-3-->
                            <div class="col-md-9">
                                <div class="fileinput  {{($gameFlavor->cover_img_id == null ? 'fileinput-new' : 'fileinput-exists')}}"
                                     data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                         style="max-height: 200px; min-height: 150px; min-width: 200px">
                                        @if($gameFlavor->cover_img_id != '')
                                            <img class="coverImg gameFlavorCoverImg"
                                                 src="{{route('resolveDataPath', ['filePath' => $gameFlavor->cover_img_file_path])}}">
                                        @endif
                                    </div>
                                    <div>
										<span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="cover_img" {{$gameFlavor->cover_img_id == '' ? 'required' : ''}}></span>
                                        <a href="#"
                                           class="btn btn-default {{($gameFlavor->cover_img_id == null ? 'fileinput-new' : 'fileinput-exists')}}"
                                           data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div><!--.col-md-9-->
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="inputer">
                                    Copyright link
                                    <div class="input-wrapper">
                                        <input name="copyright_link" type="url"
                                               class="form-control"
                                               placeholder="Link to the copyright information about this game"
                                               value="{{ old('copyright_link') != '' ? old('copyright_link') : $gameFlavor['copyright_link']}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="icheckbox">
                                <label>
                                    <input type="checkbox" name="files_usage" required>
                                    I confirm that I have the rights to use the files I uploaded
                                </label>
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="icheckbox">
                                <label>
                                    <input type="checkbox" name="terms" required>
                                    I accept the terms & conditions (<a href="https://docs.google.com/document/d/1aWYOtHhs-0HlbwJU0Oa6ODskbDIgTDuupeLMrvbV210/edit#">English</a>, <a href="https://docs.google.com/document/d/1JVA3pMhdB2N3ScxzjKhlxjWnmBacrtamp3zGIkiLz5A/edit#heading=h.p1izbjl48qks">Greek</a>)
                                </label>
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="icheckbox">
                                <label>
                                    <input type="checkbox" name="allow_clone" {{$gameFlavor['allow_clone'] == true ? 'checked' : ''}}>
                                    I allow others to use (clone) this game for building new games
                                </label>
                            </div>
                        </div>
                        <div class="submitBtnContainer">
                            {{--<button type="button" class="btn btn-flat-primary"><a class="cancelTourCreateBtn" href="{{ URL::route('home') }}">Cancel</a> </button>--}}
                            <button type="submit" id="gameFlavorSubmitBtn" class="btn btn-primary btn-ripple">
                                {{($gameFlavor->id == null ? 'Create' : 'Save')}}
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
