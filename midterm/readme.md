## 중간고사 과제


#### 개발 환경 소개
  - 데이터베이스: MySQL 사용
    - 이유: MySQL은 세계에서 제일 많이 사용하는 오픈 소스의 관계형 데이터베이스 관리 시스템이다. 많은 사용들이 사용하는 만큼 신뢰도가 높다고 생각해서 선택하였다.
           또한 다운 받은 sakila 데이터베이스도 MySQL에서 제공하는 무료 DB여서 좀 더 사용하기 편리했다.


  - (백엔드) 서버 사이드 언어: PHP 사용
  - (프론트엔드) 클라이언트 사이드 언어: HTML, CSS 사용
  - 웹 서버: 윈도우,  Apache Web Server 사용
    - 이유: 리눅스는 텍스트 모드로 관리를 해야 하기 때문에 GUI 기반인 윈도우보다 편의성이 떨어졌다. 또한 리눅스는 기술 지원이 아직까지는 부족하고,
            주요 설정같은 것들은 명령어를 입력하거나 환경 설정파일을 편집해야 한다는 불편함이 존재한다. 그래서 사용이 용이한 윈도우를 선택하게 되었다.
   
   
#### 발견한 정보
- sakila 데이터베이스를 이용하여 영화 대여에 관련된 시스템을 만들었다.
<img width="960" alt="chrome_7rzhovgT7z" src="https://user-images.githubusercontent.com/70560199/97800184-92d3ba00-1c76-11eb-9eb3-f09d01230ab7.png">

- 영화 전체 정보를 볼 수 있게 하였다. film, film_actor, language 테이블을 inner join해서 제목(title), 발매연도(release_year), 언어(name), 배우 ID(actor_id) 컬럼들을 출력을 해서 전체적인 영화의 정보를 나타나게 하였다.
<img width="960" alt="chrome_fAHzURFVyD" src="https://user-images.githubusercontent.com/70560199/97800202-bf87d180-1c76-11eb-9155-ae9c80c21bf0.png">

- 영화들이 각 지점 별로 몇 개씩 있는지 볼 수 있게 하였다. film, inventory, store 테이블을 inner join해서 지점 ID(store_id), 영화 제목(title), 개수(count(*)) 컬럼들을 출력을 하여서 각 지점 별로 보유하고 있는 영화의 제목과 개수를 나타나게 하였다.
하지만 본인이 찾고 싶은 영화를 찾으려면 나올 때까지 스크롤을 내려야 하는 단점이 있다. 그래서 찾고 싶은 영화 제목을 입력하면 찾을 수 있는 기능을 추가하였다.
<img width="960" alt="chrome_gEEuIUUvaK" src="https://user-images.githubusercontent.com/70560199/97800218-ec3be900-1c76-11eb-969a-9905bc0b22e2.png">
<img width="960" alt="chrome_TSGwAymgDC" src="https://user-images.githubusercontent.com/70560199/97800222-f5c55100-1c76-11eb-81f0-35249c3535be.png">


- 대여 정보를 볼 수 있게 하였다. customer 테이블과 rental 테이블을 inner join해서 대여 ID(rental_id), 이름(first_name), 성(last_name), 대여 날짜(rental_date), 반납 날짜(return_date)를 나타나게 하였다.
그냥 대여 정보를 클릭하면 전체 고객들의 대여 정보가 나오고, 해당 고객의 대여 정보만 보고 싶을 수 있기에 폼에 이름을 쓰면 해당 고객의 대여 정보만 출력되도록 하였다.
<img width="960" alt="chrome_GgNmGHPp4k" src="https://user-images.githubusercontent.com/70560199/97800242-0f669880-1c77-11eb-88dc-beb5c3ef6f7e.png">
<img width="960" alt="chrome_qY5Tf27hEK" src="https://user-images.githubusercontent.com/70560199/97800246-12618900-1c77-11eb-80fb-73ba9039c88e.png">
<img width="960" alt="chrome_sNYDPHIfLa" src="https://user-images.githubusercontent.com/70560199/97800250-168da680-1c77-11eb-9d83-5f1ba5a0aa40.png">



#### 동작 화면 소개 영상
- https://www.youtube.com/watch?v=nAhGgnTcihg&feature=youtu.be
