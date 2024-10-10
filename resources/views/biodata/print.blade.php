<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data->kode_biodata}} {{$data->nama}}</title>
</head>

<body>

    <table style="width: 100%; text-align:center;">
        <tr>
            <td width="25%"><img src="{{ asset('assets/images/logo.png') }}" width="200"></td>
            <td width="50%"><img src="{{ asset('assets/images/namept.png') }}" width="100%"> <img
                    src="{{ asset('assets/images/datapt.png') }}" width="100%"></td>
            <td width="25%"><img src="{{ asset('assets/images/sshc.png') }}" width="100"></td>
        </tr>
    </table>
    <table border="1" style="border: 1px solid #000; width:100%;"></table>
    <br>
    <table border="1"
        style="border: 1px solid #000; width:100%; border-collapse:collapse; text-align:center; font-size:10pt;">
        <tr>
            <td width="60%" colspan="4" style="text-align: center;">個人資料 PERSONALITY</td>
            <td width="40%" style="text-align: center;">編號Biodata Number : {{ $data->kode_biodata }}</td>
        </tr>
        <tr>
            <td width="15%">姓名 Full Name</td>
            <td width="15%">{{ $data->nama }}</td>
            <td width="15%">出生地 Place of Birth</td>
            <td width="15%">{{$data->tempat_lahir}}</td>
            <td rowspan="11"> 
                @if ($data->foto != '-' || $data->foto != null)
                <img src="{{  asset('uploads/' . $data->foto) }}"
                width="100%" height="100%"/></td>
                @endif
               
        </tr>
        <tr>
            <td width="15%">國籍 Nationality</td>
            <td width="15%">{{$data->kewarganegaraan}}</td>
            <td width="15%">年齡Age</td>
            <td width="20%">{{$data->umur}}</td>
           
        </tr>
        <tr>
            <td width="15%">性別 Gender</td>
            <td width="15%">{{$data->jenis_kelamin}}</td>
            <td width="15%">身高Height</td>
            <td width="15%">{{$data->tb}}</td>
           
        </tr>
        <tr>
            <td width="15%">宗教Religion
            </td>
            <td width="15%">{{$data->agama}}</td>
            <td width="15%">體重Weight
            </td>
            <td width="15%">{{$data->bb}}</td>
            
        </tr>
        <tr>
            <td width="15%">婚姻狀況 Marriage Status</td>
            <td width="15%">{{$data->status_pernikahan}}</td>
            <td width="15%">出生日期 Date Of Birth</td>
            <td width="15%"> {{date_format(date_create($data->tgl_lahir),'d M Y')}}</td>
             
        </tr>
        <tr>
            <td width="60%" colspan="4">家 庭 成員 Family Members</td>
        </tr>
        <tr>
            <td width="15%">家人有 My Family have</td>
            <td width="45%" colspan="3"> <input type="checkbox" name="father" id="father" {{$data->status_ayah ? 'checked' : ''}}> 爸爸 father 年齡  : {{$data->umur_ayah != null ? $data->umur_ayah : '0'}}  歲 <br>  <input type="checkbox" name="ibu" id="ibu" {{$data->status_ibu ? 'checked' : ''}}>   媽媽 Mother    年齡  : {{$data->umur_ibu != null ? $data->umur_ibu : '0'}}  歲</td>
        </tr>
        <tr>
            <td width="15%">兄弟姐妹共有 Brother and Sister</td>
            <td width="15%">{{$data->jumlah_saudara }}</td>
            <td width="15%">姐姐： {{$data->kakak_perempuan}}<br> 妹妹：{{$data->adik_perempuan}}</td>
            <td width="15%">哥哥 ： {{$data->kakak_laki_laki}} <br> 弟弟 ：{{$data->adik_laki_laki}}</td>
        </tr>
        <tr>
            <td width="15%">家裡排行第
                number In the family </td>
            <td width="45%" colspan="3">{{$data->anak_ke}}</td>
        </tr>
        <tr>
            <td width="15%">女傭老公的姓名 Name of husband's</td>
            <td width="45%" colspan="3">{{$data->nama_suami}}</td>
        </tr>
        <tr>
            <td width="15%">丈夫事業 Spouse profession</td>
            <td width="45%" colspan="3">{{$data->karir_suami}}</td>
        </tr>
        <tr>
            <td width="15%">小孩共有 Child</td>
            <td width="85%" colspan="4">{{$data->jml_anak}}</td>
        </tr>
        <tr>
            <td width="15%">男孩Boys</td>
            <td width="15%" colspan="2">{{$data->jml_anak_laki_laki}}</td>
            <td width="15%">年齡Age</td>
            <td width="55%" >{{$data->umur_anak_laki_laki}}</td>
            
        </tr>
        <tr>
            <td width="15%">女孩 Girls</td>
            <td width="15%"colspan="2">{{$data->jml_anak_perempuan}}</td>
            <td width="15%">年齡Age</td>
            <td width="55%" >{{$data->umur_anak_perempuan}}</td>
        </tr>
        <tr>
            <td width="100%" colspan="5">是否有親友在台 ? <input type="checkbox" name="family_in_taiwan" id="family_in_taiwan_yes" {{$data->family_in_taiwan == '1' ? 'checked' : ''}}>Yes <input type="checkbox" name="family_in_taiwan" id="family_in_taiwan_no" {{$data->family_in_taiwan != '1' ? 'checked' : ''}}>No <br>Do you have family / friend's working in Taiwan ?</td>
        </tr>
        <tr>
            <td width="15%">最高學歷Education
            </td>
            <td width="85%" colspan="4">{{$data->pendidikan}}</td>
        </tr>
        <tr>
            <td width="15%">語言能力Language
            </td>
            <td width="85%" colspan="4">{{$data->bahasa}}</td>
        </tr>
        <tr>
            <td width="100%" colspan="5">國内Domestic</td>
        </tr>
        <tr>
            <td width="15%">工作期
            </td>
            <td width="15%">印尼本地區
            </td>
            <td width="60%" colspan="3">工作內容</td>
        </tr>
        @if (isset($data) && $data->BiodataExperiences()->count() > 0)
            @foreach ($data->BiodataExperiences as $bed)
                @if ($bed->type_pekerjaan == 'domestic')
                <tr>
                    <td width="15%">{{ $bed->masa_kerja }}
                    </td>
                    <td width="15%">{{ $bed->wilayah_kerja }}
                    </td>
                    <td width="60%" colspan="3">{{ $bed->desc_pekerjaan }}</td>
                </tr>
                @endif
            @endforeach
        @endif
        <tr>
            <td width="100%" colspan="5">國外Overseas</td>
        </tr>
        <tr>
            <td width="15%">工作期
            </td>
            <td width="15%">國別
            </td>
            <td width="60%" colspan="3">工作內容</td>
        </tr>
        @if (isset($data) && $data->BiodataExperiences()->count() > 0)
            @foreach ($data->BiodataExperiences as $bed)
                @if ($bed->type_pekerjaan == 'overseas')
                <tr>
                    <td width="15%">{{ $bed->masa_kerja }}
                    </td>
                    <td width="15%">{{ $bed->wilayah_kerja }}
                    </td>
                    <td width="60%" colspan="3">{{ $bed->desc_pekerjaan }}</td>
                </tr>
                @endif
            @endforeach
        @endif
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
