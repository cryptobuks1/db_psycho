<?php

use Illuminate\Database\Seeder;

class AttachedDocumentFileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AttachedDocumentFile::truncate();

        \App\Models\AttachedDocumentFile::create( [


            'att_doc_file_name'=>'911_Паспорт_ФЛ',
            'att_doc_file_code'=>'20190305131407',
            'file_type_id'=>'1',
            'att_doc_file_size'=>'3536',
            'att_doc_id'=>'14',
            'att_doc_file_title_id'=>'0',
            'att_doc_file'=>
                'wtvB0MDS3CDQwMfQxdjFzc3bxQ0KCcLbwc7QDQoJCcrOw8TAINDg8ffl8vvRz+Xw
                                8e7t4Ovu7M7x8uDy6ujIzuHu8O7y+y7Q5ePo8fLw4PLu8CA9IM3Fzs/QxcTFy8XN
                                zg0KCQkJ0s7DxMAgTlVMTA0KCQnIzcDXxSDQ4PH35fL70c/l8PHu7eDr7uzO8fLg
                                8uroyM7h7vDu8vsu0OXj6PHy8ODy7vANCgnKzs3F1iDKwMog0OXj6PHy8ODy7vAs
                                DQoJ0ODx9+Xy+9HP5fDx7u3g6+7szvHy4PLq6MjO4e7w7vL7Ls/l8Oju5NHl6vPt
                                5OAsDQoJ0ODx9+Xy+9HP5fDx7u3g6+7szvHy4PLq6MjO4e7w7vL7Ls/l8Oju5Mzo
                                7fPy4CwNCgnQ4PH35fL70c/l8PHu7eDr7uzO8fLg8uroyM7h7vDu8vsuz+Xw6O7k
                                1+DxLA0KCdDg8ffl8vvRz+Xw8e7t4Ovu7M7x8uDy6ujIzuHu8O7y+y7P5fDo7uTE
                                5e38LA0KCdDg8ffl8vvRz+Xw8e7t4Ovu7M7x8uDy6ujIzuHu8O7y+y7P5fDo7uTN
                                5eTl6/8sDQoJ0ODx9+Xy+9HP5fDx7u3g6+7szvHy4PLq6MjO4e7w7vL7Ls/l8Oju
                                5MTl6uDk4CwNCgnQ4PH35fL70c/l8PHu7eDr7uzO8fLg8uroyM7h7vDu8vsuz+Xw
                                6O7kzOXx//YsDQoJ0ODx9+Xy+9HP5fDx7u3g6+7szvHy4PLq6MjO4e7w7vL7Ls/l
                                8Oju5Mri4PDy4OssDQoJ0ODx9+Xy+9HP5fDx7u3g6+7szvHy4PLq6MjO4e7w7vL7
                                Ls/l8Oju5M/u6/Pj7uTo5SwNCgnQ4PH35fL70c/l8PHu7eDr7uzO8fLg8uroyM7h
                                7vDu8vsuz+Xw6O7kw+7kLA0KCdDg8ffl8vvRz+Xw8e7t4Ovu7M7x8uDy6ujIzuHu
                                8O7y+y7O8OPg7ejn4Pbo/ywNCgnQ4PH35fL70c/l8PHu7eDr7uzO8fLg8uroyM7h
                                7vDu8vsu0fLw8+ry8/Dt4P/F5Ojt6PbgIMrAyiDP7uTw4Ofk5evl7ejlLA0KCdDg
                                8ffl8vvRz+Xw8e7t4Ovu7M7x8uDy6ujIzuHu8O7y+y7R7vLw8+Tt6OosDQoJ0ODx
                                9+Xy+9HP5fDx7u3g6+7szvHy4PLq6MjO4e7w7vL7LsLg6/7y4CwNCgnQ4PH35fL7
                                0c/l8PHu7eDr7uzO8fLg8uroyM7h7vDu8vsuz+Xw6O7k0OXj6PHy8OD26OgsDQoJ
                                0ODx9+Xy+9HP5fDx7u3g6+7szvHy4PLq6MjO4e7w7vL7LtHz7OzgzeD34Ov87fvp
                                zvHy4PLu6iwNCgnQ4PH35fL70c/l8PHu7eDr7uzO8fLg8uroyM7h7vDu8vsu0fPs
                                7ODK7u3l9+376c7x8uDy7uosDQoJ0ODx9+Xy+9HP5fDx7u3g6+7szvHy4PLq6MjO
                                4e7w7vL7LtHz7OzgzuHu8O7yLA0KCdDg8ffl8vvRz+Xw8e7t4Ovu7M7x8uDy6ujI
                                zuHu8O7y+y7R8+zs4M/w6PXu5CwNCgnQ4PH35fL70c/l8PHu7eDr7uzO8fLg8uro
                                yM7h7vDu8vsu0fPs7ODQ4PH17uQsDQoJ0ODx9+Xy+9HP5fDx7u3g6+7szvHy4PLq
                                6MjO4e7w7vL7LtHz7OzgwuDrzeD34Ov87fvpzvHy4PLu6iwNCgnQ4PH35fL70c/l
                                8PHu7eDr7uzO8fLg8uroyM7h7vDu8vsu0fPs7ODC4OvK7u3l9+376c7x8uDy7uos
                                DQoJ0ODx9+Xy+9HP5fDx7u3g6+7szvHy4PLq6MjO4e7w7vL7LtHz7OzgwuDrzuHu
                                8O7yLA0KCdDg8ffl8vvRz+Xw8e7t4Ovu7M7x8uDy6ujIzuHu8O7y+y7R8+zs4MLg
                                68/w6PXu5CwNCgnQ4PH35fL70c/l8PHu7eDr7uzO8fLg8uroyM7h7vDu8vsu0fPs
                                7ODC4OvQ4PH17uQsDQoJ0ODx9+Xy+9HP5fDx7u3g6+7szvHy4PLq6MjO4e7w7vL7
                                LtHu8vDz5O3o6i7U6Ofr6PbuIMrAyiDU6Ofr6PbuLA0KCdDg8ffl8vvRz+Xw8e7t
                                4Ovu7M7x8uDy6ujIzuHu8O7y+y7R7vLw8+Tt6Oou0ujvx+Dt//Lu8fLoIMrAyiDS
                                6O/H4O3/8u7x8ugsDQoJ0ODx9+Xy+9HP5fDx7u3g6+7szvHy4PLq6MjO4e7w7vL7
                                LtHu8vDz5O3o6i7K7uQgysDKINLg4c3u7OXwLA0KCdHTzMzAKNDg8ffl8vvRz+Xw
                                8e7t4Ovu7M7x8uDy6ujIzuHu8O7y+y7R8+zs4MLg68ru7eX37fvpzvHy4PLu6ikg
                                ysDKIMLx5ePuDQrIxw0KCdDl4+jx8vDN4Oru7+vl7ej/LtDg8ffl8vvRz+Xw8e7t
                                4Ovu7C7O8fLg8uroyM7h7vDu8vsoLCAsIMDi8u4sIMTi6Obl7ej/LCApIMrAyiDQ
                                4PH35fL70c/l8PHu7eDr7uzO8fLg8uroyM7h7vDu8vsNCg0K0cPQ08/PyNDOwsDS
                                3CDPzg0KCdDg8ffl8vvRz+Xw8e7t4Ovu7M7x8uDy6ujIzuHu8O7y+y7P5fDo7uTR
                                5erz7eTgLA0KCdDg8ffl8vvRz+Xw8e7t4Ovu7M7x8uDy6ujIzuHu8O7y+y7P5fDo
                                7uTM6O3z8uAsDQoJ0ODx9+Xy+9HP5fDx7u3g6+7szvHy4PLq6MjO4e7w7vL7Ls/l
                                8Oju5Nfg8SwNCgnQ4PH35fL70c/l8PHu7eDr7uzO8fLg8uroyM7h7vDu8vsuz+Xw
                                6O7kxOXt/CwNCgnQ4PH35fL70c/l8PHu7eDr7uzO8fLg8uroyM7h7vDu8vsuz+Xw
                                6O7kzeXk5ev/LA0KCdDg8ffl8vvRz+Xw8e7t4Ovu7M7x8uDy6ujIzuHu8O7y+y7P
                                5fDo7uTE5erg5OAsDQoJ0ODx9+Xy+9HP5fDx7u3g6+7szvHy4PLq6MjO4e7w7vL7
                                Ls/l8Oju5Mzl8f/2LA0KCdDg8ffl8vvRz+Xw8e7t4Ovu7M7x8uDy6ujIzuHu8O7y
                                +y7P5fDo7uTK4uDw8uDrLA0KCdDg8ffl8vvRz+Xw8e7t4Ovu7M7x8uDy6ujIzuHu
                                8O7y+y7P5fDo7uTP7uvz4+7k6OUsDQoJ0ODx9+Xy+9HP5fDx7u3g6+7szvHy4PLq
                                6MjO4e7w7vL7Ls/l8Oju5MPu5CwNCgnQ4PH35fL70c/l8PHu7eDr7uzO8fLg8uro
                                yM7h7vDu8vsuzvDj4O3o5+D26P8sDQoJ0ODx9+Xy+9HP5fDx7u3g6+7szvHy4PLq
                                6MjO4e7w7vL7LtHy8PPq8vPw7eD/xeTo7ej24CwNCgnQ4PH35fL70c/l8PHu7eDr
                                7uzO8fLg8uroyM7h7vDu8vsu0e7y8PPk7ejqLA0KCdDg8ffl8vvRz+Xw8e7t4Ovu
                                7M7x8uDy6ujIzuHu8O7y+y7C4Ov+8uAsDQoJ0ODx9+Xy+9HP5fDx7u3g6+7szvHy
                                4PLq6MjO4e7w7vL7Ls/l8Oju5NDl4+jx8vDg9ujoLA0KCdDg8ffl8vvRz+Xw8e7t
                                4Ovu7M7x8uDy6ujIzuHu8O7y+y7R8+zs4M3g9+Dr/O376c7x8uDy7uosDQoJ0ODx
                                9+Xy+9HP5fDx7u3g6+7szvHy4PLq6MjO4e7w7vL7LtHz7Ozgyu7t5fft++nO8fLg
                                8u7qLA0KCdDg8ffl8vvRz+Xw8e7t4Ovu7M7x8uDy6ujIzuHu8O7y+y7R8+zs4M7h
                                7vDu8iwNCgnQ4PH35fL70c/l8PHu7eDr7uzO8fLg8uroyM7h7vDu8vsu0fPs7ODP
                                8Oj17uQsDQoJ0ODx9+Xy+9HP5fDx7u3g6+7szvHy4PLq6MjO4e7w7vL7LtHz7Ozg
                                0ODx9e7kLA0KCdDg8ffl8vvRz+Xw8e7t4Ovu7M7x8uDy6ujIzuHu8O7y+y7R8+zs
                                4MLg683g9+Dr/O376c7x8uDy7uosDQoJ0ODx9+Xy+9HP5fDx7u3g6+7szvHy4PLq
                                6MjO4e7w7vL7LtHz7OzgwuDryu7t5fft++nO8fLg8u7qLA0KCdDg8ffl8vvRz+Xw
                                8e7t4Ovu7M7x8uDy6ujIzuHu8O7y+y7R8+zs4MLg687h7vDu8iwNCgnQ4PH35fL7
                                0c/l8PHu7eDr7uzO8fLg8uroyM7h7vDu8vsu0fPs7ODC4OvP8Oj17uQsDQoJ0ODx
                                9+Xy+9HP5fDx7u3g6+7szvHy4PLq6MjO4e7w7vL7LtHz7OzgwuDr0ODx9e7kLA0K
                                CdDg8ffl8vvRz+Xw8e7t4Ovu7M7x8uDy6ujIzuHu8O7y+y7R7vLw8+Tt6Oou1Ojn
                                6+j27iwNCgnQ4PH35fL70c/l8PHu7eDr7uzO8fLg8uroyM7h7vDu8vsu0e7y8PPk
                                7ejqLtLo78fg7f/y7vHy6CwNCgnQ4PH35fL70c/l8PHu7eDr7uzO8fLg8uroyM7h
                                7vDu8vsu0e7y8PPk7ejqLsru5CwNCgnC28HO0A0KCQnKzsPEwCDQ4PH35fL70c/l
                                8PHu7eDr7uzO8fLg8uroyM7h7vDu8vsu0OXj6PHy8ODy7vAgPSDNxc7P0MXExcvF
                                zc4NCgkJCdLOw8TAIE5VTEwNCgkJyM3A18Ug0ODx9+Xy+9HP5fDx7u3g6+7szvHy
                                4PLq6MjO4e7w7vL7LtDl4+jx8vDg8u7wDQoJys7NxdY=',

            'att_doc_file_link'=>'/2018_11_23_1',
            'att_doc_file_description'=>'Страница паспорта 2018_11_23_1',
            'att_doc_file_status'=>'0',
            'uid_1c_code'=>'8cf2fe6b-fc82-11e8-979b-005056c00008',
            'deleted_l'=>'0',

        ] );
    }
}
