## 11주차 학습회고
#### 새로 배운 내용
  * 트랜잭션
    * DB의 상태를 변환시키는 하나의 논리적 기능을 수행하기 위한 작업의 단위
    * 한꺼번에 모두 수행되어야 할 일련의 연산들
    * commit, rollback
    * 원자성, 일관성, 독립성, 지속성
    
   * JDBC - SQL 쿼리 전송 인터페이스
      * 자바에서 db로 쿼리문 전송할 때 사용할 수 있는 인터페이스
        * Statement, PreparedStatement, CallableStatement
        * 반드시 try-catch 문 처리를 해야 함

#### 문제가 발생하거나 고민한 내용 + 해결 과정
  * insert 실습 부분에서 도민준을 추가하고 가장 마지막 직원 데이터를 조회했는데 그대로 employee_id 가 206번인 직원이 조회되었다.
  그래서 전체 직원을 조회해 보니 207번의 도민준이 맨 첫 번째 행에 삽입되어 있었다. 그래서 order by employee_id로 sql문을 수정해서 정렬한 후에 가장 마지막 데이터를 조회하는 방법을 이용했다.

#### 참고할 만한 내용
  * https://webstone.tistory.com/56

#### 회고 (+, -, !)
  * (+): 자바와 오라클을 같이 활용해서 실습하는 것이 처음이라서 재미있었다.
  * (-): sqldeveloper에서 insert를 하면 데이터가 끝 부분이 아니라 첫 번째에 삽입이 되었는데 아직 이유를 찾지 못했다.
  * (!): commit을 꼭 해주어야 한다는 걸 느꼈다.

#### 동작 화면 영상
  * https://www.youtube.com/watch?v=3aqbiFflM-A
